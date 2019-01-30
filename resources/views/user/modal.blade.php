<!-- Modal -->
<div class="modal fade" id="manageCodingModal" tabindex="-1" role="dialog" aria-labelledby="manageCodingModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="frmManageCoding" action="{{route('postAddUser')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <input type="hidden" name="id" id="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="manageCodingModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--  Name -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Name" required>
                        </div>
                    </div>
                    <!--  Name -->
                    <!--  Age -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="age" class="control-label">Age</label>
                            <input type="number" name="age" value="{{old('age')}}" class="form-control" id="age" placeholder="Age" required>
                        </div>
                    </div>
                    <!-- Age  -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>