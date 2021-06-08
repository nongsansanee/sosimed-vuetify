<template>
   <v-container fluid fill-height>
            <v-layout align-center justify-center>
               <v-flex xs12 sm8 md6>
                  <v-card class="elevation-10">
                     <v-toolbar dark color="primary">
                        <v-toolbar-title>ระบบสารสนเทศภาควิชาอายุรศาสตร์</v-toolbar-title>
                     </v-toolbar>
                     <div class=" red lighten-3 mt-4 ml-2 mr-2">
                      Login ด้วย Siriraj AD (ใช้ User ID และ Password เดี่ยวกับ SiIT Enterprise ปัจจุบัน)
                    </div>
                        <v-card-text>
                            <form >
                                <v-text-field
                                    v-model="username"
                                    :error-messages="usernameErrors"
                                    label="Username(ชื่อ.นามสกุล 3 ตัว ภาษาอังกฤษ)"
                                    required
                                    @input="$v.username.$touch()"
                                    @blur="$v.username.$touch()"
                                ></v-text-field>
                                <v-text-field
                                    v-model="password"
                                    :error-messages="passwordErrors"
                                    label="Password"
                                    type="password"
                                    required
                                    @input="$v.password.$touch()"
                                    @blur="$v.password.$touch()"
                                ></v-text-field>
                            

                                <v-btn color="primary"
                                    class="mr-4"
                                    @click="submit"
                                >
                                Login
                                </v-btn>
                                <v-btn color="blue-grey lighten-3" @click="clear">
                                 clear
                                </v-btn>
                            </form>
                     </v-card-text>
                     <!-- <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="primary" to="/">Login</v-btn>
                    </v-card-actions> -->
            </v-card>
        </v-flex>
    </v-layout>
    </v-container>

</template>

<script>
import { validationMixin } from 'vuelidate'
import { required } from 'vuelidate/lib/validators'

  export default {
    mixins: [validationMixin],

    validations: {
      username: { required},
      password: { required },
    
    },

    data: () => ({
      username: '',
      password: '',
     
    }),

    computed: {
        usernameErrors () {
            const errors = []
            if (!this.$v.username.$dirty) return errors
            !this.$v.username.required && errors.push('Username is required.')
            return errors
        },
        passwordErrors () {
            const errors = []
            if (!this.$v.password.$dirty) return errors
            !this.$v.password.required && errors.push('Password is required')
            return errors
        },
    },

    methods: {
      submit () {
       
        this.$v.$touch()
              //alert('aaa='+ this.username)
              // axios.get('/welcome')
              //      .then(response => {alert('success yes')} )
              //      .catch(error =>  {alert('error')})

          axios.post('/login', 
                    { 
                      username: this.username,
                      password: this.password, 
                    }).then((response) => {
                      alert('success') 
                      location.href = "http://localhost:8001/portal"
                     //window.location.replace(response);
                    
                  })
                  .catch((error) => {
                    alert('error')
                  })
      },
      clear () {
        this.$v.$reset()
        this.username = ''
        this.password = ''
        
      },
    },
  }
</script>

<style>

</style>