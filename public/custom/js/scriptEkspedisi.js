$(document).ready(function() {
	//set CSRF Token
    $.ajaxSetup({
		headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('#datatable').DataTable({
        processing : true,
        autoWidth :false,
		serverSide : true,
		responsive : true,
		ajax : '/table/ekspedisi',
		// ajax : "{{ route('table.departments') }}",
		columns : [
			{data: 'id_ekspedisi', name: 'id_ekspedisi'},
			{data: 'kode_ekspedisi', name: 'kode_ekspedisi'},
            {data: 'nama_ekspedisi', name: 'nama_ekspedisi'},
            {data: 'is_active', name: 'is_active'},
			{data: 'create_by', name: 'create_by'},
			{data: 'create_on', name: 'create_on'},
			{data: 'update_by', name: 'update_by'},
			{data: 'update_on', name: 'update_on'},
			{data: 'action', name: 'action'}
		]
    });	
});	

$("#btn-view").click(function(){
    $("btn-view").addClass("nav-active");
});

$("#btn-new").click(function(){
    $("btn-new").addClass("nav-active");
});

$("#btn-print").click(function(){
    $("#btn-print").addClass("nav-active");
});

$("#btn-pdf").click(function(){
    $("#btn-pdf").addClass("nav-active");
});

$("#btn-excel").click(function(){
    $("#btn-excel").addClass("nav-active");
});