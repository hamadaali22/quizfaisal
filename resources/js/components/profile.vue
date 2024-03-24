<template>
   <div>
     <section class="login">
       <div class="container">
           <div class="row mt-5 p-3">
               <div class="col">
                   <img  :src="this.userData.photo" class="img-fluid pt-3 mt-5 " alt="">
                    <!-- <input type="file" accept="image/jpeg" @change="uploadImage"> -->
                    <input type="file" accept="image/*" @change="uploadImage($event)" id="file-input">

               </div>
               <form class="col text-center" method="post">
                   <h4 class="m-3"> REGESTRIEN {{this.userData.name}}</h4>
                   <!-- <input type="email" class="w-100 mb-2" placeholder="Email"  v-model="email" > -->
                   <!-- <input type="password" class="w-100 mb-2" placeholder="Password"  v-model="password"> -->

                  <input type="text" class="w-100 mb-2" placeholder="Name" v-model="name">
                  <input type="text" class="w-100 mb-2" placeholder="Handynummer" v-model="mobile">
                  <!-- <input type="text" class="w-100 mb-2" placeholder="Sprache" v-model="Language"> -->
                  <!-- <input type="text" class="w-100 mb-2" placeholder="Land" v-model="Country"> -->


                  <select class="w-100 mb-2 form-control formselect" v-model="country">
                    <option selected value=""> Country </option>
                    <option  value="Deutschland">Deutschland</option>
                    <option  value="Österreich">Österreich</option>
                      <option  value="Schweiz">Schweiz</option>
                    <option  value="Niederlande">Niederlande</option>
                    <option  value="Frankreich">Frankreich</option>
                    <option  value="Polen">Polen</option>
                    <option  value="Tschechische Republik">Tschechische Republik</option>
                    <!-- <option  value="Republik">Republik</option> -->
                    <option  value="Ungarn">Ungarn</option>
                    <option  value="Dänemark">Dänemark</option>
                    <option  value="Großbritanien">Großbritanien</option>
                    <option  value="USA">USA</option>
                    <option  value="Brasilien">Brasilien</option>
                    <option  value="China">China</option>
                    <option  value="Indien">Indien</option>
                    <option  value="andere">andere</option>
                  </select>
                  <select class="w-100 mb-2 form-control formselect" v-model="language">
                    <option selected value=""> Language </option>
                    <option  value="Arabisch">Arabisch</option>
                    <option  value="Deutsch">Deutsch</option>
                    <option  value="Englisch">Englisch</option>
                    <option  value=" Französisch"> Französisch</option>
                    <option  value="Spanisch ">Spanisch </option>
                    <option  value="andere ">andere </option>
                  </select>
                <input type="submit" @click.prevent="userUpdate"   id="btn" value="speichern" class="mt-2">
                   <div class="d-flex justify-content-between">
                       <!-- <a href="#">Register</a> -->
                      <router-link to="login" style="color:#6298bf">ANMELDEN</router-link>
                      <!-- <a href="#" style="color:#6298bf">Forget password</a> -->
                   </div>
               </form>
           </div>
       </div>
      </section>
   </div>
</template>

<script>
export default {
 data(){
    return {
             // password : '',
             // email : '',
             name : '',
             mobile : '',
             language : '',
             country : '',
             photo:'',
            userData:'',
         }
     },
     computed:{
       contactInfo(){
          return this.$store.state.contactInfo;
       }
     },
     created(){
        this.getUserdata();

       console.log('fffffffffvb');
       console.log(this.$store.state.userToken.token);


     },
     mounted(){
       this.$store.dispatch('getContactinfo');

     },
     methods:{
       userUpdate(){
            let  {name,mobile,language,country} = this;
            this.$store.dispatch('userUpdate',{name,mobile,language,country})
       },
       uploadImage(event) {


           let data = new FormData();
           // data.append('name', 'my-picture');
           data.append('photo', event.target.files[0]);
           const headers = {
               'Content-Type': 'application/json',
               'Authorization': 'Bearer '+this.$store.state.userToken.token
           };
          console.log('ddd');
          console.log(this.$store.state.userToken.token);
          console.log('ddd');
             axios.post('https://deutschtests.com/api/profile-update', data,{headers})
                 .then(res => {
                 if(res.data.status==true){
                   var resTitle='uvbujhbjh';
                 }else {
                   var resTitle='jbjhbj';
                 }

                   swal({
                       title: resTitle,
                       text: res.data.msg,
                       icon: "success",
                       timer: 10500
                   });
                     console.log(res.data)
                     // commit('setUserToken', res.data.token)

                 })
                 .catch(err => {
                     console.log(err)
                 })
         },
       getUserdata(){
            const headers = {
               'Content-Type': 'application/json',
               'Authorization': 'Bearer '+this.$store.state.userToken.token
             };
             axios.get('https://deutschtests.com/api/user-data',{headers})
             .then(res => {
                  console.log(res.data);
                  this.userData = res.data.data;
                  this.name=res.data.data.name
                  this.mobile=res.data.data.mobile
                  this.language=res.data.data.language
                  this.country=res.data.data.country
                })
               .then(err => console.log(err))
        }
     }
}
</script>
