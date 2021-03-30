<template>
  <table class="mt-4 table table-striped table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">Speciality</th>
        <th scope="col">Hospital</th>
        <th scope="col">Contact</th>
        <th scope="col">Added On</th>
        <th scope="col">Updated On</th>
        <!-- <th scope="col" colspan="2">Actions</th> -->
      </tr>
    </thead>
    <tbody>
      <tr v-for="doctor in doctors" :key="doctor.doc_id">
        <th scope="row">{{doctor.doc_id}}</th>
        <td>{{doctor.doc_name}}</td>
        <td>{{doctor.doc_spec}}</td>
        <td>{{doctor.doc_hospital}}</td>
        <td>{{doctor.doc_contact}}</td>
        <td>{{doctor.created_at}}</td>
        <td>{{doctor.updated_at}}</td>
        <!-- <td>
          <form action="{{route('medicine.destroy', ['id' => $medicine->med_id])}}" method="DELETE">
            <button type="submit" class="btn btn-danger">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>
        </td>-->
        <td>
          <form :action="'http://hamds.test/doctor/'+ doctor.doc_id + '/edit?'" method="GET">
            <button type="submit" class="btn btn-info">
              <i class="far fa-edit"></i>
            </button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  props: ["doctors"],
  data() {
    return {};
  },
  created() {
    Fire.$on("searching", () => {
      let query = this.$parent.search;
      axios
        .get("http://hamds.test/api/findDoctor?q=" + query)
        .then(data => {
          this.doctors = data.data;
        })
        .catch(() => {});
    });
  }
};
</script>