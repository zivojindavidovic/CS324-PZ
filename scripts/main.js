jQuery(document).ready(function(){
    $("#uploadImgBtn").click(function(e){
        e.preventDefault();

        let file_temp = $("#imageUpload input").val();

        if(file_temp.includes('.png') || file_temp.includes('.jpg') || file_temp.includes('.jpeg')){
            $("#imageUpload").submit();
        }else{
            alert("Fajl mora biti JPG, PNG ili JPEG");
        }
    });
    $("#uploadTxtBtn").click(function(e){
        e.preventDefault();

        let file_temp = $("#textUpload input").val();

        if(file_temp.includes('.txt') || file_temp.includes('.docx')){
            $("#textUpload").submit();
        }else{
            alert("Fajl mora biti TXT ili DOCX");
        }
    });
    $("#uploadAudioBtn").click(function(e){
        e.preventDefault();

        let file_temp = $("#audioUpload input").val();

        if(file_temp.includes('.mp3')){
            $("#audioUpload").submit();
        }else{
            alert("Fajl mora biti MP3");
        }
    });
    $("#uploadVideoBtn").click(function(e){
        e.preventDefault();

        let file_temp = $("#videoUpload input").val();

        if(file_temp.includes('.mp4')){
            $("#videoUpload").submit();
        }else{
            alert("Fajl mora biti MP4");
        }
    });
});

