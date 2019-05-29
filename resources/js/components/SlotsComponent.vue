<template>
    <div class="container">
        <button @click="test()">TEST</button>
        <div class="row justify-content-center">
            
            <div>
                <table>
                    <tbody>
                      <tr>
                        <td>1.1</td>
                        <td>1.2</td>
                        <td>1.3</td>
                      </tr>
                      <tr>
                        <td>2.1</td>
                        <td>2.2</td>
                        <td>2.3</td>
                      </tr>
                      <tr>
                        <td>3.1</td>
                        <td>3.2</td>
                        <td>3.3</td>
                      </tr>
                    </tbody>                
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
        methods:{
            test(){
                alert('test');
            }


        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
