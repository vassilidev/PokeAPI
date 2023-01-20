<template>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item" v-for="page in pages">
        <a class="page-link"
           v-bind:class="{'active' : page === currentPage}"
           href="#"
           @click="this.$emit('changePage', page)">
          {{ page }}
        </a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "PokemonPagination",
  props: ['perPage', 'total', 'currentPage'],
  data() {
    return {
      pages: [],
      maxPages: 5,
    };
  },
  mounted() {
    this.makePagination();
  },
  methods: {
    makePagination() {
      let pages = [];

      let nbrOfPages = Math.ceil(this.total / this.perPage);

      let first = this.currentPage - this.maxPages;
      let last = this.currentPage + this.maxPages;

      if (first <= 0) {
        first = 1;
      }

      if (last > nbrOfPages) {
        last = nbrOfPages - 1;
      }

      if (this.currentPage > 0) {
        for (let i = this.currentPage; i >= first; i--) {
          pages.push(i);
        }
      }

      if (this.currentPage < nbrOfPages) {
        for (let i = this.currentPage + 1; i <= last; i++) {
          pages.push(i);
        }
      }

      pages.sort(function (a, b) {
        return a - b
      });

      if (first > 1) {
        pages.unshift('...');
        pages.unshift(1);
      }

      if (this.currentPage < nbrOfPages && last !== nbrOfPages) {
        pages.push('...');
        pages.push(nbrOfPages);
      }

      this.pages = pages;
    }
  }
}
</script>