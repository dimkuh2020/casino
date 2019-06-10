<template>
    <div class="container">
        <button @click="test()">TEST</button>
        <div class="row justify-content-center"> 
            <div>
                <table>
                    <tr>
                        <td v-for="sm in slotmachine[0]"> 
                            <img class="slots" v-bind:src="sm.url" v-model="slotmachine[0]">
                        </td>
                    </tr>
                     <tr>
                        <td v-for="sm in slotmachine[1]"> 
                            <img class="slots" v-bind:src="sm.url" v-model="slotmachine[1]">
                        </td>
                    </tr>
                    <tr>
                        <td v-for="sm in slotmachine[2]"> 
                            <img class="slots" v-bind:src="sm.url" v-model="slotmachine[2]">
                        </td>
                      </tr>                    
                </table>
            </div>
        </div>
    </div>
</template>

<style type="text/css">
    table {
        width: 330px;
        height: 330px;
        border: solid 3px blue;

    }

    td {        
        width: 100px;
        border: solid 2px blue;
        border-bottom:0;
        border-top: 0;        
    }

    tr{
        height: 100px; 

    }
</style>

<script>
    export default {
         data() {
            return { 
                bet: null,          //ставка null 
                tempindex: null,    
                slotmachine: [[],[],[]]      //пустой 2мерный массив для машины
                
            }
        }, 

        props: [
            'slots',
            'user',
            'cash',
            'id',
        ],


        methods:{
            test(){
                for(var i=0; i<3; i++) {
                    this.tempindex = Math.floor(Math.random()*this.slots.length); 
                    this.slotmachine[0].push(this.slots[this.tempindex]);  
                
                    this.tempindex = Math.floor(Math.random()*this.slots.length); 
                    this.slotmachine[1].push(this.slots[this.tempindex]);
                
                    this.tempindex = Math.floor(Math.random()*this.slots.length); 
                    this.slotmachine[2].push(this.slots[this.tempindex]);
                }
                
                console.log(this.slotmachine);
                
            },

        },

        mounted() {
            console.log('Component mounted.');
            for(var i=0; i<3; i++) {
                    this.tempindex = Math.floor(Math.random()*this.slots.length); 
                    this.slotmachine[0].push(this.slots[this.tempindex]);  
                
                    this.tempindex = Math.floor(Math.random()*this.slots.length); 
                    this.slotmachine[1].push(this.slots[this.tempindex]);
                
                    this.tempindex = Math.floor(Math.random()*this.slots.length); 
                    this.slotmachine[2].push(this.slots[this.tempindex]);
                }
                
            console.log(this.slotmachine); 

        }
    }
</script>
