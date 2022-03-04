<script>
import { revolveText } from "./helpers.js";

export default {
    name: "RandomSpiral",

    computed: {
        breakdowns() {
            return this.random.breakdowns || [];
        },
        breakdownValues() {
            return this.breakdowns.map(breakdown => breakdown.value).join(" ... ");
        },
    },

    methods: {
        initializeSpiral() {
            const canvas = this.$refs.canvas[0];
            const context = canvas.getContext('2d');


            CanvasRenderingContext2D.prototype.fillTextCircle = function(text,x,y,radius,startRotation){
                this.save();
                this.translate(x,y);
                this.rotate(startRotation);
            
                for(var i=0; i < text.length; i++) {
                    var rot = context.measureText(text[i]).width / (Math.PI * radius * 2) * Math.PI*2;
                    this.fillText(text[i], 0, -radius);
                    this.rotate(rot);
                    radius += .5;
                }
                this.restore();
            }

            context.font = "bold 12px";
            context.fillTextCircle(this.breakdownValues, 150, 150, 10, Math.PI / 2);
        }
    },


    props: {
        random: Object,
    },

    mounted() {
        this.initializeSpiral();
    }
}
</script>