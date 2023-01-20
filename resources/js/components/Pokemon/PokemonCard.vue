<template>
  <div class="col-lg-3 col-md-6 col-sm-12">
    <div v-if="!loading" class="card mb-4" style="width: 18rem;">
      <img :src='"data:image/png;base64, " + pokemonData.image' class="card-img-top" :alt="pokemonData.name">
      <div class="card-body">
        <h5 class="card-title text-center">{{ pokemonData.name }}</h5>

        <ul class="list-group">
          <li class="list-group-item active">{{ $t('message.info') }}</li>
          <li class="list-group-item">{{ $t('message.height') }} : {{ pokemonData.height }}</li>
          <li class="list-group-item">{{ $t('message.weight') }} : {{ pokemonData.weight }}</li>
        </ul>

        <hr>

        <ul class="list-group">
          <li class="list-group-item active">{{ $t('message.types') }}</li>
          <li class="list-group-item" v-for="type in pokemonData.types">
            {{ type.type.name }}
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PokemonCard",
  props: ['pokemon'],
  data() {
    return {
      loading: true,
      pokemonData: [],
    };
  },
  async mounted() {
    await this.getPokemonData();
  },
  methods: {
    async getPokemonData() {
      await axios.get(`/api/pokemon/${this.pokemon.name}`)
          .then(response => (this.pokemonData = response.data.data));

      this.loading = false;
    },
  }
}
</script>