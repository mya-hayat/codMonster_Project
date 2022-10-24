

<style>
    .content {
        padding: 30px 50px !important;
    }
    .hide-message {
        display: none !important;
    }
    .flex-rd {
        display: flex;
        flex-wrap: wrap;
    }
    .flex-rd label {
        flex: 0 0 100%;
        display: block;
    }
    .flex-rd input {
        flex: 0 0 80%;
    }
    .flex-rd span {
        flex: 0 0 20%;
        max-width: 57px;
        height: 42px;
        margin-left: 10px;
    }
    .option-listed {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
    }
    .option-listed .option-listed-second {
        flex: 0 0 45%;
        margin-right: 10px
    }
    .option-listed .selected_option {
        list-style: none;
        padding: 15px 0px;
    }
    .option-listed .selected_option li {
        padding: 10px 0px;
        font-size: 15px;
        font-weight: 600;
        position: relative;
    }
    .option-listed .selected_option li a {
        position: absolute;
        content: "";
        right: 5px;
        top: 4px;
        width: 22px;
        height: 22px;
        background: rgb(191, 14, 14);
        border-radius: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #FFF;
        cursor: pointer;
    }
    .option-listed .selected_option li a:hover {
        opacity: 0.7;
        background: red;
    }
    .option-listed-second {
        position: relative;
    }
    .option-listed-second .remove-opt-list {
        position: absolute;
        content: "";
        right: 5px;
        top: 10px;
        width: 22px;
        height: 22px;
        background: rgb(191, 14, 14);
        border-radius: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #FFF;
        cursor: pointer;
    }
    .option-listed-second .remove-opt-list:hover {
        opacity: 0.7;
        background: red;
    }

    #form_preview .card-title {
        justify-content: center;
        text-align: center;
        display: flex;
        width: 100%;
    }

    #form_preview #btn_submit {
        width: 100%;
        margin-top: 30px;
    }

    .settings-input .circle {
        display: block;
        border: none;
        height: 40px;
        width: 75px;
    }

    #form_preview #btn_submit:hover {
        background: transparent !important;
        opacity: 0.7;
        color: #000;
    }

    #script {
        width: 100%;
        height: 350px;
        min-height: 350px;
        max-height: 350px;
    }

    .text-area-live {
        position: relative;
    }

    .text-area-live span{
        position: absolute;
        right: 80px;
        font-size: 23px;
        top: 60px;
        cursor: pointer;
    }

    .text-area-live span i {
        font-size: 23px !important;
    }


</style>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
