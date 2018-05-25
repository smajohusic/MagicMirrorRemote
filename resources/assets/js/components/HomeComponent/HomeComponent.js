import template from './HomeComponent.html';
import axios from 'axios';

export default {
  template: template,

  data () {
    return {
      // todo: implement a gloabla loader
      verified: false,
    };
  },

  methods: {
    screenOn() {
      this.enableLoader();

      axios.post('/api/ssh/screen-on')
        .then(response => {
          this.disableLoader();
          console.log('success', response);
        })
        .catch(error => {
          this.disableLoader();
          console.log('error', error.data);
        });
    },

    screenOff() {
      this.enableLoader();

      axios.post('/api/ssh/screen-off')
        .then(response => {
          this.disableLoader();
          console.log('success', response);
        })
        .catch(error => {
          this.disableLoader();
          console.log('error', error.data);
        });
    },

    enableLoader() {
      $('.loader').show();
      $('#app').css('background-color', 'lightgrey');
    },

    disableLoader() {
      $('.loader').hide();
      $('#app').css('background-color', '');
    },
  }
}
