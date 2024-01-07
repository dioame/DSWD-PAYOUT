export class Camera {
  constructor(videoElement, opt) {
    this.videoElement = videoElement;
    this.opt = opt;
  }

  addCaptureButton() {
    const captureButton = document.createElement('button');
    captureButton.textContent = 'Capture';
    captureButton.addEventListener('click', () => this.captureAndSend());
    document.body.appendChild(captureButton);
  }

  async captureAndSend() {
    if (this.active) {
      const canvas = document.createElement('canvas');
      const context = canvas.getContext('2d');
      canvas.width = this.videoElement.videoWidth;
      canvas.height = this.videoElement.videoHeight;
      context.drawImage(this.videoElement, 0, 0, canvas.width, canvas.height);

      const imageData = canvas.toDataURL('image/jpeg'); // Convert captured frame to base64

      // Send the captured image data to the server using AJAX
      await this.sendImageToServer(imageData);
    }
  }



  async sendImageToServer(imageData) {
    const url = 'http://dswd-payout.test/api/v1/admin/capture';
    const payrollNo = '2000';
    
    // Create FormData and append fields
    const formData = new FormData();
    formData.append('payroll_no', payrollNo);
    formData.append('file', dataURItoBlob(imageData), 'image.jpg'); // Convert base64 data to Blob
    
    // Make the fetch request
    const response = await fetch(url, {
      method: 'POST',
      body: formData,
      headers: {
        'accept': 'application/json',
      },
    });
    
    // Check the response
    if (response.ok) {
      const result = await response.json();
      console.log('Response:', result);
    } else {
      console.error('Failed to send the request');
    }
    
    // Function to convert data URI to Blob
    function dataURItoBlob(dataURI) {
      const byteString = atob(dataURI.split(',')[1]);
      const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
      const ab = new ArrayBuffer(byteString.length);
      const ia = new Uint8Array(ab);
    
      for (let i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
      }
    
      return new Blob([ab], { type: mimeString });
    }
  }

  async start() {
    this.addCaptureButton();

    const w = this.opt.width || 1280;
    const h = this.opt.height || 720;
    const video = {
      width: { ideal: w },
      height: { ideal: h },
    };
    if (navigator.userAgent.indexOf("Android") == -1) {
      video.facingMode = this.opt.backcamera ? { ideal: "environment" } : "user";
    }
    await navigator.mediaDevices.getUserMedia({ video: true });
    const devs = await navigator.mediaDevices.enumerateDevices();
    //console.log(devs);
    /*
    const div = document.createElement("div");
    document.body.appendChild(div);
    div.innerHTML += JSON.stringify(devs.filter(d => d.kind == "videoinput"), null, 2).replace(/\n/g, "<br>");
    */
    const tryToStart = async (devs) => {
      for (const dev of devs) {
        try {
          video.deviceId = dev.deviceId;
          const stream = await navigator.mediaDevices.getUserMedia({ video });
          this.videoElement.srcObject = stream;
          this.delay = 1000 / (this.opt.fps || 30);
          this.stream = stream;
          this.videoElement.playsInline = true;
          this.videoElement.autoplay = true;
          this.videoElement.play();
          this.active = true;
          this.endfunc = null;
          const f = async () => {
            if (!this.active) {
              if (this.endfunc) {
                this.endfunc();
              }
              return;
            }
            const v = this.videoElement;
            if (v.readyState == HTMLMediaElement.HAVE_ENOUGH_DATA) {
              await this.opt.onFrame();
            }
            setTimeout(f, this.delay);
          };
          f();
          return;
        } catch (e) {
          console.log(e);
        }
      }
    };

    let devs2 = devs.filter(d => {
      const l = d.label.toLowerCase();
      const back = l.indexOf("back") >= 0 || l.indexOf("背面") >= 0;
      return d.kind == "videoinput" &&
        //l.indexOf("camera") >= 0 &&
        l.indexOf("immersed") == -1 &&
        l.indexOf("virtual") == -1 &&
        this.opt.backcamera == back;
    });
    //console.log("devs2", devs2)
    if (devs2.length > 0) {
      await tryToStart(devs2);
    } else {
      devs2 = devs.filter(d => {
        const l = d.label.toLowerCase();
        return d.kind == "videoinput" &&
          //l.indexOf("camera") >= 0 &&
          l.indexOf("immersed") == -1 &&
          l.indexOf("virtual") == -1;
      });
      if (devs2.length > 0) {
        await tryToStart(devs2);
      }
    }
  }
  async stop() {
    return new Promise((resolve) => {
      this.videoElement.pause();
      if (this.stream) {
        this.stream.getVideoTracks().forEach(v => v.stop());
        this.stream = null;
      }
      this.videoElement.srcObject = null;
      this.active = false;
      this.endfunc = resolve;
    });
  }
  async flip() {
    await this.stop();
    this.opt.backcamera = !this.opt.backcamera;
    await this.start();
  }
};