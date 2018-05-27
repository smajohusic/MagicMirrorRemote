import template from './WebCameraComponent.html';
import axios from 'axios';


export default {
  template,

  data() {
    return {
      enabled: false,
      video: null,
      images: [],
    };
  },

  methods: {
    enableWebCam() {
      this.enabled = true;

      if (navigator.mediaDevices.getUserMedia) {
        // Request the camera.
        navigator.mediaDevices.getUserMedia({
          video: {
            facingMode: "user",
            width: 480,
            height: 368
          }
        })
          .then(this.processStream)
          .catch(this.handleError);
      } else {
        alert('Sorry, your browser does not support getUserMedia or is not using secure connection');
      }
    },

    storeImage() {
      const canvas = document.getElementById("canvas-elemet");
      canvas.getContext("2d").drawImage(this.video, 0, 0, 480, 368, 0, 0, 480, 368);

      // Get the image content
      const base64image = canvas.toDataURL("image/jpg");

      // Do a post request and save the file with php, then return the full path and store it in images array
      axios.post('/api/web-camera/store', { imageContent: base64image})
        .then(response => {
          this.images.push(response.data.path);
          console.log(response.data);
        })
        .catch(error => {
          console.log(error.data);
        });

      // const buf = new Buffer(image, 'base64');
    },

    stopCamera() {

    },

    processStream(mediaStream) {
      this.video = document.getElementById('camera-stream');

      try {
        this.video.srcObject = mediaStream;
      } catch (error) {
        this.video.src = URL.createObjectURL(mediaStream);
      }
    },

    handleError(err) {
      this.enabled = false;

      console.log(err);
    },
  },
}
