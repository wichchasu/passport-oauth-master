

<style scoped>

form{
    max-width:320px;
    width:90%;
    background-color: #ffffff;
    padding:40px;
    border-radius:4px;
    transform:translate(-50%, 35%);
    position:absolute;
    top:50%;
    left:50%;
    color: #A34693;
    box-shadow:3px 3px 4px rgba(0,0,0,0.2);
}
.vertical-center .form-control:focus {
    border-color: #2554FF;
    box-shadow: none;
}

.vertical-center h3 {
    text-align: center;
    margin: 0;
    line-height: 1;
    padding-bottom: 20px;
}

label {
    font-weight: 500;
}


.btn-outline-primary {
    color: #A34693;
    background-color: transparent;
    background-image: none;
    border-color: #A34693
}

.btn-outline-primary:hover {
    color: #fff;
    background-color: #A34693;
    border-color: #A34693
}

.btn-outline-primary:focus,
.btn-outline-primary.focus {
    box-shadow: 0 0 0 .2rem rgba(119, 204, 204, 0.5)
}

.btn-outline-primary.disabled,
.btn-outline-primary:disabled {
    color: #A34693;
    background-color: transparent
}

.btn-outline-primary:not(:disabled):not(.disabled):active,
.btn-outline-primary:not(:disabled):not(.disabled).active,
.show>.btn-outline-primary.dropdown-toggle {
    color: #212529;
    background-color: #A34693;
    border-color: #A34693
}

.btn-outline-primary:not(:disabled):not(.disabled):active:focus,
.btn-outline-primary:not(:disabled):not(.disabled).active:focus,
.show>.btn-outline-primary.dropdown-toggle:focus {
    box-shadow: 0 0 0 .2rem rgba(119, 204, 204, 0.5)
}




</style>

<template>
    <div class="vue-tempalte">
        <form>
            <h3>BSRU Sign In</h3>

            <div class="form-group">
<!--                <label>Username</label>-->
                <input type="text" class="form-control form-control-lg" placeholder="Username" />
            </div>

            <div class="form-group">
<!--                <label>Password</label>-->
                <input type="password" class="form-control form-control-lg" placeholder="Password" />
            </div>

            <button type="submit" class="btn btn-lg btn-outline-primary btn-block">Sign In</button>


        </form>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('BSRU Component mounted')
    }
}
</script>

