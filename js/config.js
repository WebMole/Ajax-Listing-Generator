$('#navigation-tabs li a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})