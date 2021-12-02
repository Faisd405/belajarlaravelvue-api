<template>
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">Murid</div>
          <router-link :to="{ name: 'create' }" class="btn btn-md btn-success"
            >TAMBAH POST</router-link
          >

          <div class="card-body">
            <div class="table-responsive mt-2">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="murid in murids" :key="murid.id">
                    <td>{{ murid.nama }}</td>
                    <td>{{ murid.kelas }}</td>
                    <td>
                      <router-link
                        :to="{ name: 'edit', params: { id: murid.id } }"
                        class="btn btn-sm btn-warning"
                      >
                        <i class="fa fa-pencil">EDIT</i>
                      </router-link>
                      <button
                        class="btn btn-sm btn-danger"
                        @click="destroy(murid.id)"
                      >
                        <i class="fa fa-trash">Delete</i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      murids: [],
    };
  },
  created() {
    let uri = `/api/murid`;
    this.axios.get(uri).then((response) => {
      this.murids = response.data.data;
    });
    console.log("hadir");
  },
  methods: {
    destroy(id) {
      let uri = `/api/murid/${id}`;
      this.axios.delete(uri).then((response) => {
        this.murids = this.murids.filter((murid) => {
          return murid.id != id;
        });
      });
    },
  },
};
</script>
