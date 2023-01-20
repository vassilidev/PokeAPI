import './bootstrap';

import "bootstrap/dist/css/bootstrap.min.css"
import * as bootstrap from "bootstrap";

import PokemonCard from "./components/Pokemon/PokemonCard.vue";
import PokemonIndex from "./components/Pokemon/PokemonIndex.vue";
import PokemonPagination from "./components/Pokemon/PokemonPagination.vue";

import {createApp} from "vue";
import {createI18n} from "vue-i18n";

window.bootstrap = bootstrap;

const i18n = createI18n({
    locale: 'en',
    fallbackLocale: 'en',
    messages: {
        en: {
            message: {
                info: 'Informations',
                height: 'Height',
                weight: 'Weight',
                types: 'Types',
            },
        }
    }
})

const app = createApp({});

app.component('pokemonCard', PokemonCard);
app.component('pokemonIndex', PokemonIndex);
app.component('pokemonPagination', PokemonPagination);

app.use(i18n);

app.mount('#app');