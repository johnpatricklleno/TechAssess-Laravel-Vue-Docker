<template>
  <div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-12 px-4">
    <div class="max-w-3xl mx-auto space-y-12">

      <!-- Feedback Form -->
      <div class="bg-white rounded-xl shadow-md p-6 sm:p-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-blue-700 mb-6 text-center">📝 Submit Feedback</h1>

        <form @submit.prevent="submitFeedback" class="space-y-6">
          <!-- Name -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input
              v-model="form.student_name"
              type="text"
              placeholder="Enter your name"
              class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
            />
          </div>

          <!-- Message -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
            <textarea
              v-model="form.message"
              rows="4"
              placeholder="Write your feedback..."
              class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
            ></textarea>
          </div>

          <!-- Rating + Button -->
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="w-full sm:w-1/3">
              <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
              <input
                v-model.number="form.rating"
                type="number"
                min="1"
                max="5"
                class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
              />
            </div>

            <button
              type="submit"
              class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md font-semibold w-full sm:w-auto"
            >
              Submit Feedback
            </button>
          </div>
        </form>
      </div>

      <!-- Feedback List -->
      <div>
        <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">💬 Recent Feedback</h2>

        <div v-if="feedbackList.length === 0" class="text-center text-gray-500 italic">
          No feedback submitted yet.
        </div>

        <div v-else class="space-y-6">
          <div
            v-for="item in feedbackList"
            :key="item.id"
            class="bg-white border border-gray-200 rounded-xl shadow-sm p-5"
          >
            <div class="flex justify-between items-start mb-2">
              <h3 class="text-lg font-semibold text-gray-800">{{ item.student_name }}</h3>
              <span class="text-yellow-500 font-medium">⭐ {{ item.rating }}/5</span>
            </div>
            <p class="text-gray-700 mb-4">{{ item.message }}</p>
            <p class="text-xs text-gray-400 text-right">🕒 {{ formatDate(item.created_at) }}</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      form: {
        student_name: '',
        message: '',
        rating: 1
      },
      feedbackList: []
    }
  },
  methods: {
    async submitFeedback() {
      try {
        await axios.post('http://localhost:8000/api/feedback', this.form)
        this.form = { student_name: '', message: '', rating: 1 }
        this.fetchFeedback()
      } catch (error) {
        console.error('Submit failed:', error)
      }
    },
    async fetchFeedback() {
      try {
        const res = await axios.get('http://localhost:8000/api/feedback')
        this.feedbackList = res.data.data
      } catch (error) {
        console.error('Fetch failed:', error)
      }
    },
    formatDate(datetime) {
      return new Date(datetime).toLocaleString()
    }
  },
  mounted() {
    this.fetchFeedback()
  }
}
</script>
