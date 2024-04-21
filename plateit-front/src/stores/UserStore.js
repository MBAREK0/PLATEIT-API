import { defineStore } from 'pinia'

export const UserStore = defineStore('UserStore', {
  state: () => ({
    role: '',
    verified: ''
    

  }),
  getters: {

  },
  actions: {
    setRole(router) {
      this.role = localStorage.getItem('role') || null;
    },
    setEmailVerifiedAt() {
      this.verified = localStorage.getItem('email_verified_at') || null;
    }

  }
})