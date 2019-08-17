<script type="text/javascript">
    $(document).ready(function(){

    });

    $("#{{$id}}").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');
        $("#slug").val(Text);
    });
</script>