<template>
  <div>
    <h1>Create Murid</h1>

    <form @submit.prevent="MuridStore">
      <div class="form-group">
        <label>Murid</label>
        <input
          type="text"
          class="form-control"
          v-model="murid.nama"
          placeholder="Masukan Nama"
        />
      </div>
      <div class="form-group">
        <label>Kelas</label>
        <input
          type="text"
          class="form-control"
          v-model="murid.kelas"
          placeholder="Masukan Kelas"
        />
      </div>
      <div class="form-group">
          <button class="btn btn-md btn-success" type="submit">SIMPAN</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      murid: {},
    };
  },
  methods: {
    MuridStore() {
        axios.post('/api/murid', this.murid)
        .then(response => {
          this.$router.push('/murid');
        })
        .catch(error => {
          console.log(error.response.data.errors);
        });
    },
  },
};
</script>
