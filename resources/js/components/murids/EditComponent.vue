<template>
  <div>
    <h1>Edit Murid</h1>

    <form @submit.prevent="MuridUpdate">
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
          <button class="btn btn-md btn-success" type="submit">Update</button>
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
  created() {
      let uri = `/api/murid/${this.$route.params.id}`;
      this.axios.get(uri).then(response => {
          this.murid = response.data.data;
      });
  },
  methods: {
    MuridUpdate() {
        let uri = '/api/murid/${this.$route.params.id}';
        this.axios.put(uri, this.murid).then(response => {
            this.$router.push('/murid');
        });
    },
  },
};
</script>
