<template>
  <html>
    <div>
      <Layout />
    </div>
  </html>
</template>

<script>
import Layout from '../components/layout/Layout.vue'
export default {
  name: 'App',
  components: {
    Layout
  },
  data() {
    return {
      message: 'Hello World'
    }
  }
}
</script>
