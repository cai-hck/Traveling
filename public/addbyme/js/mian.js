$(document).ready(function(){
    //Chosen
  $(".choiceChosen, .productChosen").chosen({});
  //Logic
  $(".choiceChosen").change(function(){
    if($(".choiceChosen option:selected").val()=="no"){
      $(".productChosen option[value='2']").attr('disabled',true).trigger("chosen:updated");
      $(".productChosen option[value='1']").removeAttr('disabled',true).trigger("chosen:updated");
    } else {
      $(".productChosen option[value='1']").attr('disabled',true).trigger("chosen:updated");
      $(".productChosen option[value='2']").removeAttr('disabled',true).trigger("chosen:updated");
    }
  })
  
})


