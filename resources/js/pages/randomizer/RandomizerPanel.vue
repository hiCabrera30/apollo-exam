<script>
import { confirm, promptSuccess, promptErrors } from 'utils/prompts';
import { get, post } from 'utils/network';
import RandomSpiral from "./RandomSpiral";

export default {
    name: "RandomizerPanel",
    components: { RandomSpiral },

    data: () => ({
        randoms: [],
    }),

    methods: {
        async registerRandoms() {
            const isConfirmed = (await confirm("Are you sure you want to generate new randoms?", "")).value;
            if (!isConfirmed) return;

            post(this.initializeRandomsLink)
                .then(response => {
                    promptSuccess(response.data.message);
                    this.fetchRandoms();
                }) 
                .catch(error => promptErrors(error.response.data.message));
        },


        fetchRandoms() {
            get(this.fetchRandomsLink)
                .then(response => this.randoms = response.data.result.randoms) 
                .catch(error => promptErrors(error.response.data.message));
        },
    },


    props: {
        initializeRandomsLink: String,
        fetchRandomsLink: String,
    },

    mounted() {
        this.fetchRandoms();
    }
}
</script>