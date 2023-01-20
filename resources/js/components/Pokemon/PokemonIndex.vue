<template>
  <div class="container w-25">
    <select v-model="perPage" v-on:change="getPokemonList" class="form-select">
      <option v-for="option in perPageOptions">{{ option }}</option>
    </select>
  </div>

  <div v-if="!loading">
    <div class="row">
      <pokemon-card v-for="pokemon in pokemonList.results"
                    :pokemon="pokemon"/>
    </div>

    <pokemon-pagination
        @changePage="changePage($event)"
        :per-page="perPage"
        :total="pokemonList.count"
        :currentPage="currentPage"/>
  </div>
</template>

<script>
export default {
  name: "PokemonIndex",
  data() {
    return {
      loading: true,
      perPage: 20,
      currentPage: 1,
      perPageOptions: [20, 50, 100, 200],
      pokemonList: [],
    }
  },
  async mounted() {
    await this.getPokemonList();

    this.loading = false;
  },
  methods: {
    async getPokemonList() {
      let offset = (this.perPage * this.currentPage) - this.perPage;

      await axios.get('/api/pokemon',
          {
            params: {
              limit: this.perPage,
              offset,
            }
          }).then(response => this.pokemonList = response.data);
    },
    async changePage(page) {
      this.currentPage = page;

      this.loading = true;

      await this.getPokemonList();

      this.loading = false;
    },
  }
}
</script>