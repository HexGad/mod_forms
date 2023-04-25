<template>
  <Builder></Builder>
</template>

<script>
import draggable from 'vuedraggable'
import Builder from "./FormBuilder/Builder.vue";

export default {
  name: "Create",
  components: {Builder},

  mounted() {
    setTimeout(()=>{
      document.body.setAttribute('data-kt-app-sidebar-minimize', 'on')
    }, 500);
  },

  methods:{
    async createForm(){
      this.is_loading = true;
      this.errors = {name: null};

      await axios.post(route('dashboard.forms.store'), this.form).then((res) => {
        window.location.href = route('dashboard.forms.index')
      }).catch((err) => {
        if (err.response && err.response.status === 422)
          this.errors = Object.assign(this.errors, err.response.data.errors);

        this.is_loading = false;
      });

    },
  },
}
</script>
<style>

.flip-list-move {
  transition: transform 0.5s;
}
.no-move {
  transition: transform 0s;
}
.ghost {
  opacity: 0.3;
  background: #eee;
}
.list-group {
  min-height: 20px;
}
.list-group-item i {
  cursor: pointer;
}
</style>
