<?php
$user_meta = get_query_var('user_meta');
?>
<?php if($user_meta["profile_user_id"]>0){ ?>
    <div id="profile_bx" class="job-bx bg-white m-b30">
    <?php
    get_template_part('template-parts/profile-user/profile-user', 'resume-view');
    ?>
</div>
    <?php } ?>
<div id="profile_summary_bx" class="job-bx bg-white m-b30">
    <?php
    get_template_part('template-parts/profile-user/profile-user', 'resume-about');
    ?>
</div>
<div id="key_skills_bx" class="job-bx bg-white m-b30">
    <?php
    get_template_part('template-parts/profile-user/profile-user', 'resume-skills');
    ?>
</div>
<div id="employment_bx" class="job-bx bg-white m-b30 ">
    <?php
    get_template_part('template-parts/profile-user/profile-user', 'resume-exp');
    ?>
</div>
<div id="eduction_bx" class="job-bx bg-white m-b30 ">
    <?php
    get_template_part('template-parts/profile-user/profile-user', 'resume-edu');
    ?>
</div>
<div id="language_bx" class="job-bx bg-white m-b30 ">
    <?php
    get_template_part('template-parts/profile-user/profile-user', 'resume-lang');
    ?>
</div>

<div id="prefer_job_bx" class="job-bx bg-white m-b30 ">
    <?php
    get_template_part('template-parts/profile-user/profile-user', 'resume-prefer');
    ?>
</div>