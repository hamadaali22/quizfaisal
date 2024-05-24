<template>
  <div>
    <section class="row home-main-section p-5 container-fluid">
      <div class="col-lg m-auto">
        <div v-for="user in users" :key="user.id" class="level w-100 text-center text-light mt-1 pt-2 pb-2">
          first name : {{ user.firstName }}
        </div>
        <button @click="createUser">add user</button>
        <br><br><br><br><br><br><br><br><br>
        <div v-for="country in countries" :key="country.id" class="level w-100 text-center text-light mt-1 pt-2 pb-2">
          {{ country.name }}
        </div>
        <br>
        <hr>
        <div v-for="item in hamada" :key="item.id" class="level w-100 text-center text-light mt-1 pt-2 pb-2">
          {{ item.firstName }}
        </div>
        <br>
        <hr>


      </div>
      <br>
      <p>{{ name }} - {{ aka }} - {{ capital }}</p>
      <button @click="addAlsoKnowAs">add aka</button>

    </section>
  </div>
</template>

<script>

import db from './init.js'
import { collection, addDoc, setDoc, doc, getDoc, getDocs, query, orderBy, where, limit, onSnapshot } from 'firebase/firestore'
export default {
  data() {
    return {
      countries: [],
      hamada: [],
      users: [],
      aka: '', name: '', capital: ''
    }

  },

  methods: {
    async createUser() {
      const colRef = collection(db, "users")
      const dataObj = {
        firstName: 'maher',
        lastName: 'ali',
        dob: '20'
      }

      const docRef = await addDoc(colRef, dataObj)
      console.log(docRef.id)
    },
    async createCountry() {
      const docRef = await setDoc(doc(db, 'countries', 'fb'), { name: 'egypt' })
      console.log(docRef.id)
    },
    async getCountryOne() {
      const docSnap = await getDoc(doc(db, 'countries', 'fb'))
      if (docSnap.exists()) {
        console.log(docSnap.data());
      } else {
        console.log('document does not exit');
      }
    },
    async getCountry() {
      const querySnap = await getDocs(query(collection(db, 'countries')))
      querySnap.forEach((item) => {
        console.log(item.data);
        this.countries.push(item.data())
      });

    },
    async getallusers() {
      onSnapshot(collection(db, 'users'), (snap) => {
        snap.forEach((item) => {
          this.users.push(item.data())
        });

      })
    },
    async getUsersWhereDoc() {
      onSnapshot(query(collection(db, 'users'), where('dob', '>', '19')), (snap) => {
        snap.forEach((item) => {
          this.users.push(item.data())
        });

      })
    },
    async getUsersWhere() {
      const q = query(collection(db, 'users'), where('dob', '>', '20'))
      // const q= query(collection(db,'users'),orderBy('firstName'))
      const querySnapp = await getDocs(q)

      querySnapp.forEach((item) => {
        console.log('fffff');
        this.hamada.push(item.data())
      });

    },
    async getUserSorderBy() {
      const q = query(collection(db, 'users'), where('dob', '>', '20'))
      // const q= query(collection(db,'users'),orderBy('firstName'))
      const querySnapp = await getDocs(q)

      querySnapp.forEach((item) => {
        console.log('fffff');
        this.hamada.push(item.data())
      });

    },
    async getUserLimit() {
      const q = query(collection(db, 'users'), orderBy('firstName'), limit(1))
      const querySnapp = await getDocs(q)

      querySnapp.forEach((item) => {
        console.log('fffff');
        this.hamada.push(item.data())
      });

    },
    async getCountries() {
      onSnapshot(doc(db, 'countries', 'us'), (snap) => {
        this.aka = snap.data().aka
        this.name = snap.data().name
        this.capital = snap.data().capital
      })
    },
    async addAlsoKnowAs() {
      await setDoc(doc(db, 'countries', 'us'), {
        aka: 'United kingdom'
      }, { merge: true })

    }
  },
  created() {
    // this.createUser();
    // this.createCountry();
    // this.getCountryOne();
    this.getCountry();
    this.getUserLimit();
    this.getCountries();
    this.getUsersWhereDoc();
    //do something after creating vue instance
    console.log('hamada!');
    // db.collection('User')
    //   .onSnapshot(snapshot=>{
    //     snapshot.docChanges().forEach(change=>{
    //       let doc = change.doc
    //       console.log('changed!');
    //
    //     })
    //   })
  }
}
</script>
