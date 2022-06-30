<template>
  <div class="home">
    <!-- <img alt="Vue logo" src="../assets/logo.png"> -->

    <h2>
      Welcome to Website Subscription App
    </h2>

    <h3>
      Select a user
    </h3>

    <div>
      <ul
        v-if="users"
        class="users"
      >
        <li
          v-for="(user, index) in users"
          :key="index"
          class="user"
          @click="selectUser(user.id)"
        >
          {{ user.name }}
        </li>
      </ul>
    </div>

    <div class="list-container">
      <ul v-if="selectedUser && websites">
        <li
          v-for="(website, index) in websites"
          :key="index"
          class="website"
        >
          {{ website.name }}

          <button
            ref="button"
            @click="subscribe(website.id)"
          >
            {{ subscribeText }}
          </button>
        </li>
      </ul>
    </div>

  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'
import axios from 'axios'

export default {
  name: 'HomeView',
  components: {
    // HelloWorld
  },
  data () {
    return {
      users: [],
      websites: [],
      selectedUser: null,
      subscribeText: 'Subscribe'
    }
  },
  mounted () {
    this.getUsers()
    this.getWebsites()
  },
  methods: {
    getUsers () {
      axios.get('http://localhost:8000/api/users')
        .then((response) => {
          this.users = response.data.data.users
        })
    },
    getWebsites () {
      axios.get('http://localhost:8000/api/websites')
        .then((response) => {
          this.websites = response.data.data.websites
        })
    },
    selectUser (userId) {
      this.selectedUser = userId
    },
    subscribe (websiteId) {
      if (this.selectUser) {
        axios.post(
          `http://localhost:8000/api/user/${this.selectedUser}/website/${websiteId}`
        )
          .then((response) => {
            console.log(response.data)
          })
      }
    }
  }
}
</script>

<style scoped lang="scss">

li {
  list-style: none;
}

.list-container {
  margin: 0px 450px;
}

.user {
  display:inline;
  margin-right: 55px;
  border: 1px solid;
}
</style>
