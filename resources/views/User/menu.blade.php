<li class="{{ $dashbord }}">
    <a href="{{ url('/dashbord') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Profile Grid</span></a>
</li>
<li class="{{ $profile }}">
    <a href="{{ url('/profile_update') }}"><i class="fa fa-edit"></i> <span class="nav-label">Update</span></a>
</li>
<li class="{{ $photo }}">
    <a href="{{ url('/profile_update_photo') }}"><i class="fa fa-file-photo-o"></i> <span class="nav-label">Photo</span></a>
</li>
<li class="{{ $personal }}">
    <a href="{{ url('/profile_update_personal') }}"><i class="fa fa-user-o"></i> <span class="nav-label">Personal</span></a>
</li>
<li class="{{ $family }}">
    <a href="{{ url('/profile_update_family') }}"><i class="fa fa-group"></i> <span class="nav-label">Family</span></a>
</li>
<li class="{{ $education }}">
    <a href="{{ url('/profile_update_education') }}"><i class="fa fa-book"></i> <span class="nav-label">Education & Job</span></a>
</li>
<li class="{{ $deactivated }}">
    <a href="{{ url('/profile_update_deactivate') }}"><i class="fa fa-book"></i> <span class="nav-label">Deactivate</span></a>
</li>