<template>
        <div class="jumbotron-fluid">
            <span id="contact"></span>
            <div class="container h-100 d-flex flex-column justify-content-center">
                <h1 class="display-3">Contact.</h1>
                <form class="m-3">
                    <div id="message-form" v-show="!sent">
                        <div class="form-group">
                            <label for="inputName" class="col-form-label">Name</label>
                            <input id="inputName" type="text" class="form-control" :class="{ 'is-invalid': invalid.name }" @keyup="validate('name')" v-model="message.name">
                            <div class="invalid-feedback">
                            Please provide your name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4" class="col-form-label">Email</label>
                            <input id="inputEmail" type="email" class="form-control" :class="{ 'is-invalid': invalid.email }"  @keyup="validate('email')"  placeholder="Email"  v-model="message.email">
                            <div class="invalid-feedback">
                            Please provide a valid email address.
                            </div>
                        </div>

                       <div class="form-group">
                            <label for="inputMessage">Message</label>
                            <textarea id="inputMessage" class="form-control" :class="{ 'is-invalid': invalid.message }" @keyup="validate('message')" rows="6" maxlength="500" v-model="message.message"></textarea>
                            <p v-show="!invalid.message" v-text="500 - message.message.length + ' characters remaining'"></p>
                            <div class="invalid-feedback">
                            Please provide a message.
                            </div>                            
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" v-model="message.optIn"> Add me to your mailing list.
                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="message-sent" v-show="sent">
                        <h2>Thank you.  Your message is sent.</h2>
                    </div>
                    <div id="message-buttons">
                        <button class="btn btn-primary" v-show="!sending && !sent" @click.prevent="sendMessage">Send</button>
                        <button class="btn btn-primary" v-show="sending"><i class="fa fa-refresh fa-spin fa-1x fa-fw mx-2"></i></button>
                    </div>
                </form>   
            </div>
        </div> 
</template>

<script>

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    export default {
        data: () => {
            return {
                sending: false,
                sent: false,
                message: {
                    name: null,
                    email: null,
                    message: "",
                    optIn: false
                },
                invalid: {
                    name: false,
                    email: false,
                    message: false
                } ,
                postResponse: null               
            }
        },

        methods: {
            sendMessage: function() {
                if (!this.message.name) this.invalid.name = true
                this.invalid.email = !(validateEmail(this.message.email))
                if (this.message.message.length < 3) this.invalid.message = true

                for(var index in this.invalid){
                  if(this.invalid[index]){
                    return
                  }
                }
                this.sending = true
                this.postMessage()
            },

            validate: function(field) {
                this.invalid[field] = false
            },   
            postMessage: function() {
                let vm = this
                axios.post('/message', this.message)
                  .then(function (response) {
                    vm.postResponse = response.data
                    vm.sending = false
                    vm.sent = true
                  })
                  .catch(function (error) {
                    console.log(error);
                  });             
            }
        },

        watch: {

        },        

        mounted() {

        }
    }
</script>
