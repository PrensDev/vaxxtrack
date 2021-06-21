/**
 * ====================================================================
 * * USERS COUNT METHOD
 * --------------------------------------------------------------------
 * This file contains the methods and functions for fetching users 
 * count
 * ====================================================================
 */

/**
 * ====================================================================
 * Declare functions here that are required to render data
 * ====================================================================
 */

liveRenderData(() => {
    if($('#usersCountContainer').length) getUsersCount();
});

/**
 * ====================================================================
 * USERS COUNT
 * ====================================================================
 */

function getUsersCount() {
    $.ajax({
        url: `${ BASE_URL_API }super-admin/users-count`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            c = result.users_count;

            $('#citizensCount').html(c.citizens);
            $('#representativesCount').html(c.representatives);
            $('#healthOfficialsCount').html(c.health_officials);
            $('#superAdminsCount').html(c.super_admins);
        }
    })
}