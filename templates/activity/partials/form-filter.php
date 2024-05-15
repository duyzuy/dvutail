<?php
$class = $args['class']

?>
<div class="search-from <?php echo $class ?>">
    <div class="form px-8 py-6 shadow-lg mb-12 rounded-lg bg-white">
        <div class="text-2xl font-[500] mb-6">Lọc hoạt động</div>
        <form id="activity_post_search_form" method="POST" class="">
            <div class="flex flex-wrap -mx-3 gap-y-6">
                <div class="item px-3">
                    <legend class="mb-3 font-[500] block"><?php esc_html_e("Localtion", 'dvutheme') ?></legend>
                    <div class="flex items-center -mx-1">
                        <div class="checkbox-control px-1">
                            <input type="checkbox" id="activity-onsite" name="onsite" class="hidden" checked />
                            <label for="activity-onsite" class="border rounded-full px-4 py-2 block cursor-pointer h-10">Onsite</label>
                        </div>
                        <div class="checkbox-control px-1">
                            <input type="checkbox" id="activity-offsite" name="offsite" class="hidden" />
                            <label for="activity-offsite" class="border rounded-full px-4 py-2 block cursor-pointer h-10">Offsite</label>
                        </div>
                    </div>
                </div>
                <div class="item px-3">
                    <legend class="mb-3 font-[500] block"><?php esc_html_e("Location", 'dvutheme') ?></legend>
                    <div class="flex items-center -mx-1">
                        <div class="checkbox-control px-1">
                            <input type="checkbox" id="activity-before_event" name="before_event" class="hidden" />
                            <label for="activity-before_event" class="border rounded-full px-4 py-2 block cursor-pointer h-10"><?php esc_html_e("Before event", 'dvutheme') ?></label>
                        </div>
                        <div class="checkbox-control px-1">
                            <input type="checkbox" id="activity-in_event" name="in_event" class="hidden" />
                            <label for="activity-in_event" class="border rounded-full px-4 py-2 block cursor-pointer h-10"><?php esc_html_e("In event", 'dvutheme') ?></label>
                        </div>
                        <div class="checkbox-control px-1">
                            <input type="checkbox" id="activity-after_event" name="after_event" class="hidden" />
                            <label for="activity-after_event" class="border rounded-full px-4 py-2 block cursor-pointer h-10"><?php esc_html_e("After event", 'dvutheme') ?></label>
                        </div>
                    </div>
                </div>
                <div class="item px-3">
                    <legend class="mb-3 font-[500] block"><?php esc_html_e("Event date", 'dvutheme') ?></legend>
                    <div class="flex items-center -mx-1">
                        <div class="checkbox-control px-1">
                            <input type="date" id="activity-date_start" name="date_start" class="border py-2 px-4 rounded-sm h-10" />
                        </div>
                        <div class="checkbox-control px-1">
                            <input type="date" id="activity-in_event" name="date_end" class="border py-2 px-4 rounded-sm h-10" />
                        </div>
                    </div>
                </div>
                <div class="content-end px-3">
                    <button class="text-white h-10 w-full items-center bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] font-bold px-6 py-2 js_search_activity" type="submit">Tim kiem</button>
                </div>
            </div>
        </form>
    </div>
</div>