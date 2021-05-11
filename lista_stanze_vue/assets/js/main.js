Vue.config.devtools = true;

var app = new Vue({
  el: '#root',
  data:{
    stanze: [],
    stanza: []
  },

  mounted(){
    console.log('ciao'),

    axios.get('http://localhost/db-hotel/lista_stanze_vue/api/stanze.php')
    .then((response)=> {
      this.stanze= response.data.response;
    });
  },
  methods: {
    getById: function (id) {
      axios.get(`http://localhost/db-hotel/lista_stanze_vue/api/stanze.php?id=${id}`)
      .then((response)=> {
        this.stanza= response.data.response;
      });
    }
  }


})
