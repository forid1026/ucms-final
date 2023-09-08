<!-- Modal -->
<div class="modal fade" id="noticeDataModal" tabindex="-1" aria-labelledby="noticeDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pb-0">
                <h5 class="modal-title" id="noticeDataModalLabel"> Notice Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <div class="modal-body">
                <div class="title-section">
                    <h5 class="notice-title"></h5>
                    <p>Published Date: <strong class="published_date"></strong></p>
                </div>
                <p class="notice-description text-justify"></p>
                <p class="text"></p>
                <iframe id="noticeUrl" src="" frameborder="0" style="border:none;" width="100%" height="500"></iframe>
                {{-- <img src="" width="100%" id="imgNoticeUrl" alt=""> --}}
            </div>
        </div>
        {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
            data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div> --}}
    </div>
</div>
