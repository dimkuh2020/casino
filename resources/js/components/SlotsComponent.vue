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
            <!--<div  class="container" style="text-align: center; padding-top: 2%; color: #1b1f3d;">
                    <h3>{{message}}{{bet}}{{char}}</h3>                                                                           
            </div>--> 
            <div class="container" style="text-align: center; padding-top: 2%">                
                <output><h4>Bet:</h4><p class="underbox">{{bet}} $</p></output>
                <output style="margin-left:5%"><h4>Cash:</h4><p class="underbox">{{cash}} $</p></output>
                <output style="margin-left:5%"><h4>Wins:</h4><p class="underbox">{{wins}} $</p></output>                
            </div> 
            <div class="container" style="text-align: center; padding-top: 2%">                
                <input type="button" @click="spin10()" class="btn btn-info" name="bet10" value="10" style="width: 120px;">
                <input type="button" @click="spin50()" class="btn btn-warning" name="bet50" value="50" style="width: 120px; margin-left:5%">
                <input type="button" @click="spin100()" class="btn btn-danger" name="bet100" value="100" style="width: 120px; margin-left:5%">
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

    .underbox{
        justify-content: center;
        align-items: center;
        border: 4px groove orangered; 
        border-radius: 30%;
        text-align: center;  
        font-size: 22px;         
        height: 50px;
        width: 120px;        
        color: #1b1f3d;
    }    
</style>

<script>
    export default {

        props: [
            'slots',
            'user',
            'cash',
            'id',
        ],

         data() {
            return { 
                bet: 0,                    //ставка 0 
                tempindex: null,
                line1: 0,                  //для суммиования выигрыша
                line2: 0,
                line3: 0,
                line4: 0,
                line5: 0,  
                wins: 0,   
                slotmachine: [[],[],[]]      //пустой 2мерный массив для машины                
            }
        },  

        methods:{            
            test(){               

                              
            },

            spin10(){                
                this.bet = 10;                
                if(this.bet > this.cash){
                    Swal.fire({
                          title: 'Not enough cash!',                        
                          confirmButtonColor: '#3490dc' 
                    })
                }
                else{
                    this.wins = this.line1 = this.line2 = this.line3 = this.line4 = this.line5 = 0;
                    this.slotmachine = [[],[],[]];
                    this.getslots(); 

                    if((this.slotmachine[0][0].title == 'cherry')&&(this.slotmachine[0][1].title == 'cherry')){
                        this.line1 = this.bet*2;
                    }
                    if((this.slotmachine[0][0].title == 'cherry')&&(this.slotmachine[0][1].title == 'cherry')&&(this.slotmachine[0][2].title == 'cherry')){
                        this.line1 = this.bet*14;
                    }                

                    if((this.slotmachine[1][0].title == 'cherry')&&(this.slotmachine[1][1].title == 'cherry')){
                        this.line2 = this.bet*2;
                    }
                    if((this.slotmachine[1][0].title == 'cherry')&&(this.slotmachine[1][1].title == 'cherry')&&(this.slotmachine[1][2].title == 'cherry')){
                        this.line2 = this.bet*14;
                    }

                    if((this.slotmachine[2][0].title == 'cherry')&&(this.slotmachine[2][1].title == 'cherry')){
                        this.line3 = this.bet*2;
                    }
                    if((this.slotmachine[2][0].title == 'cherry')&&(this.slotmachine[2][1].title == 'cherry')&&(this.slotmachine[2][2].title == 'cherry')){
                        this.line3 = this.bet*14;
                    }

                    if((this.slotmachine[0][0].title == 'cherry')&&(this.slotmachine[1][1].title == 'cherry')){
                        this.line4 = this.bet*2;
                    }
                    if((this.slotmachine[0][0].title == 'cherry')&&(this.slotmachine[1][1].title == 'cherry')&&(this.slotmachine[2][2].title == 'cherry')){
                        this.line4 = this.bet*14;
                    }

                    if((this.slotmachine[2][0].title == 'cherry')&&(this.slotmachine[1][1].title == 'cherry')){
                        this.line5 = this.bet*2;
                    }
                    if((this.slotmachine[2][0].title == 'cherry')&&(this.slotmachine[1][1].title == 'cherry')&&(this.slotmachine[0][2].title == 'cherry')){
                        this.line5 = this.bet*14;
                    }

                    this.wins = this.line1+this.line2+this.line3+this.line4+this.line5;

                    console.log('1 - '+ this.line1);  //для проверки
                    console.log('2 - '+ this.line2); 
                    console.log('3 - '+ this.line3); 
                    console.log('4 - '+ this.line4); 
                    console.log('5 - '+ this.line5);  
                    console.log('w - '+ this.wins);

                    }
            },

             getslots(){
                 for(var i=0; i<3; i++) {
                        this.tempindex = Math.floor(Math.random()*this.slots.length); 
                        this.slotmachine[0].push(this.slots[this.tempindex]);  
                    
                        this.tempindex = Math.floor(Math.random()*this.slots.length); 
                        this.slotmachine[1].push(this.slots[this.tempindex]);
                    
                        this.tempindex = Math.floor(Math.random()*this.slots.length); 
                        this.slotmachine[2].push(this.slots[this.tempindex]);
                    }
            }
        },

       
        mounted() {
            console.log('Component mounted.');
            this.getslots(); 
        }
    }
</script>
