@extends('layouts.layout')

@section('content')
			<!--INTERNAL Select2 css -->
            <link href="assets/plugins/select2/select2.min.css" rel="stylesheet" />
<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Requisition Form</h3>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('RfqFormAction') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Requisition ID <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="req_id" value="{{ $reqId }}" placeholder="Requisition ID" readonly required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Requisition Date <span class="text-red">*</span></label>
                            <input type="date" class="form-control" name="req_date" placeholder="Requisition Date" required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Requisition Type <span class="text-red">*</span></label>
                            <select class="form-control select2-show-search" name="req_type" data-placeholder="Choose one (with searchbox)" required>
                                <optgroup label="Select Requisition Type">
                                    <option value="RFI">RFI</option>
                                    <option value="RFP">RFP</option>
                                    <option value="RFQ">RFQ</option>
                                </optgroup>
                                {{-- <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                </optgroup> --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Requisition No. <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="req_no" placeholder="Requisition No. " required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Requisition Title <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="req_title" placeholder="Requisition title" required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Requisition Subject </label>
                            <input type="text" name="req_subject" class="form-control" placeholder="Requisition Subject">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="form-label">Requisition Description </label>
                            <textarea type="text" id="" name="req_desc" class="form-control" placeholder="Requisition Description" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Requisition For <span class="text-red">*</span></label>
                            <select class="form-control select2-show-search" name="req_for" data-placeholder="Choose one (with searchbox)" required>
                                <optgroup label="Select Requisition Type">
                                    <option value="C">Consumeable</option>
                                    <option value="F">Fixed</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Solicitation Type <span class="text-red">*</span></label>
                            <select class="form-control select2-show-search" name="sol_type" data-placeholder="Choose one (with searchbox)" required>
                                <optgroup label="Select Requisition Type">
                                    <option value="M">Meterial</option>
                                    <option value="P">Product</option>
                                    <option value="S">Service</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Initiated By <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="initiated_by" placeholder="Initiated By" id="initiated_by" value="{{ Auth::user()->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Requesting Department <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="requesting_department" placeholder="Requesting Department" value="Accounts" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Requester <span class="text-red">*</span></label>
                            <input type="text" class="form-control" placeholder="Requester" value="" >
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Project for <span class="text-red">*</span></label>
                            <input type="text" class="form-control" name="project_for" placeholder="Project For" value="" required>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Bid Type <span class="text-red">*</span></label>
                            <select class="form-control select2-show-search" name="bid_type" data-placeholder="Choose one (with searchbox)" required>
                                <optgroup label="Select Requisition Type">
                                    <option value="OPEN">Open</option>
                                    <option value="LIMITED">Limited</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    
                    <!-- MULTI FILE UPLOAD  -->
                    <div class="col-sm-12 col-md-12 mt-4 mb-4">
                        <label class="form-label">Suporting Document</label>
                        <div class="input-group file-browser mb-5">
                            <input type="text" class="form-control border-right-0 browse-file" placeholder="choose" readonly="" >
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Browse <input type="file" style="display: none;" name="attachment[]" multiple>
                                </span>
                            </label>
                        </div>
                    </div>
                    <!-- ITEM LIST -->
                    <div class="col-sm-12 col-md-12 mt-4">
                        <div style="display: flex; justify-content: space-between;">
                            <h3 class="card-title">Item List</h3>
                            <p onclick="duplicate()" class="btn btn-primary">Add Item</p>
                        </div>
                        
                        <table id="my_table" class="table table-hover card-table table-vcenter text-nowrap">
                            <thead>
                            </thead>
                            <tbody> 
                                <tr id="row0">
                                    <td>
                                        <div class="form-group">
                                            <label class="form-label">Item <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="data[0][item]" placeholder="Item" value="" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label class="form-label">Specification <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="data[0][spec]" placeholder="Specification" value="" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label class="form-label">Oty <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="data[0][oty]" placeholder="Oty" value="" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label class="form-label">UOM <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="data[0][umo]" placeholder="UOM" value="" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label class="form-label">Delivered Within <span class="text-red">*</span></label>
                                            <input type="date" class="form-control" name="data[0][delivered_within]" placeholder="Delivered Within" value="" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label class="form-label">Remarks <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="data[0][remark]" placeholder="Remarks" value="" required>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                    <div class="col-sm-12 col-md-12 mt-4 text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
		<!-- INTERNAL File uploads js -->
        <script src="assets/plugins/fileupload/js/dropify.js"></script>
		<script src="assets/js/filupload.js"></script>
<!--INTERNAL Select2 js -->
<script src="assets/plugins/select2/select2.full.min.js"></script>
<script src="assets/js/select2.js"></script>

<script>
    var i = 1;
    function duplicate(){
        var html = "";
        html = '<tr id="row'+i+'"><td><div class="form-group"><label class="form-label">Item <span class="text-red"></span></label><input type="text"  name="data['+i+'][item]" class="form-control" placeholder="Item" value="" ></div></td><td><div class="form-group"><label class="form-label">Specification <span class="text-red"></span></label><input type="text"  name="data['+i+'][spec]" class="form-control" placeholder="Specification" value="" ></div></td> <td><div class="form-group"><label class="form-label">Oty <span class="text-red"></span></label><input type="text"  name="data['+i+'][oty]" class="form-control" placeholder="Oty" value=""></div></td><td><div class="form-group"><label class="form-label">UOM<span class="text-red"></span></label><input type="text"  name="data['+i+'][umo]" class="form-control" placeholder="UOM" value=""></div></td><td><div class="form-group"><label class="form-label">Delivered Within<span class="text-red"></span></label><input type="date"  name="data['+i+'][delivered_within]" class="form-control" placeholder="Delivered Within" value=""></div></td><td><div class="form-group"><label class="form-label">Remarks <span class="text-red"></span></label><input type="text"  name="data['+i+'][remark]" class="form-control" placeholder="Remarks" value=""></div></td><td><button class="btn btn-danger" onclick="cancel('+i+')">cancel</button></td></tr>';

        $('#my_table').append(html);
        i++;
    }
    function cancel(i) { 
        $('#row'+i).remove();
    }
</script>
