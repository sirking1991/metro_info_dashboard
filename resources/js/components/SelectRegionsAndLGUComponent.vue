<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div>
          Please select the Region and LGU you are allowed to administer content.
          <div class="form-group">
            <select
              class="form-control"
              name="selectedRegionShortName"
              v-model="selectedRegion"
              v-on:change="prefillLGUS()"
            >
              <option value>[Select Region]</option>
              <option
                :value="region.short_name"
                v-for="region in regions"
                :key="region.id"
              >{{ region.name }} ({{ region.short_name }})</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="selectedLGU" v-model="selectedLGU">
              <option value>[Select Local Government Unit]</option>
              <option :value="lgu.id" v-for="lgu in lgus" :key="lgu.id">{{ lgu.name }}</option>
            </select>
          </div>
          <div class="form-group">
            Upload your Identification Card (Any government issued ID with photo)
            <input
              type="file"
              name="applicantID"
              class="form-control"
            />
          </div>
          <div class="form-group">
            Upload Authorization letter from the mayor
            <input
              type="file"
              name="authorizationLetter"
              class="form-control"
            />
          </div>
          <div class="form-group">
            Upload Mayor's Identification Card (Any government issued ID with photo)
            <input
              type="file"
              name="mayorID"
              class="form-control"
            />
          </div>
          <div
            class="text-muted"
          >We need this documents to verify your identify and that you are authorized to post content related to the LGU</div>

          <input v-bind:class="{disabled: processing}" v-on:click="processing=true" type="submit" class="btn btn-primary" value="Submit application" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["r", "l"],
  data: function(){
    return {
      'processing': false,
    };
  },
  mounted() {
    // populate regions & lgus variables
    this.regions = JSON.parse(this.r);
    this.lgus = [];
  },
  data: function() {
    return {
      selectedRegion: "",
      selectedLGU: "",
      applicationID: "",
      authorizationLetter: "",
      mayorID: "",
      regions: [],
      lgus: []
    };
  },
  methods: {
    prefillLGUS: function() {
      const tmp = JSON.parse(this.l);
      this.lgus = tmp.filter(v => v.region_short_name == this.selectedRegion);
      this.selectedLGU = "";
    }
  }
};
</script>
