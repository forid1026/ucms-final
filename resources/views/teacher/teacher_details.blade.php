<!-- Modal -->
<div class="modal fade" id="teacherDataModal" tabindex="-1" aria-labelledby="teacherDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pb-0">
                <h5 class="modal-title" id="teacherDataModalLabel"> <span class="teacher-name"></span> Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="birth_date" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="userImg" class="form-label">User Image</label>
                        <br>
                        <img id="userImg" src="" class="img-thumbnail" width="120" alt="" />
                        {{-- <span id="userImg"></span> --}}
                    </div>

                </form>


            </div>
        </div>
        {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
            data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div> --}}
    </div>
</div>
