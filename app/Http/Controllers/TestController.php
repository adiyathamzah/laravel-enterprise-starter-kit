<?php namespace App\Http\Controllers;

use App\Repositories\AuditRepository as Audit;
use App\Repositories\ReportPermissionsAndRolesByUsersRepository;
use App\Repositories\ReportRoutesRepository;
use App\Repositories\ReportUsersRepository;
use App\User;
use Auth;
use Exception;
use Flash;
use GridEncoder;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function report_users()
    {
        $page_title = "Report users";
        $page_description = "Showing a sample report with the users.";
        $page_message = "";

        return view('report-users', compact('page_title', 'page_description', 'page_message'));
    }

    public function report_users_data(Request $request)
    {
        GridEncoder::encodeRequestedData(new ReportUsersRepository(new User()), $request->all());
    }

    public function report_routes()
    {
        $page_title = "Report routes";
        $page_description = "Showing a sample report with the users.";
        $page_message = "";

        return view('report-routes', compact('page_title', 'page_description', 'page_message'));
    }

    public function report_routes_data(Request $request)
    {
        GridEncoder::encodeRequestedData(new ReportRoutesRepository(), $request->all());
    }

    public function report_perms_and_roles_by_users()
    {
        $page_title = "Report permissions and roles";
        $page_description = "Showing a sample report of the permissions and roles grouped by users.";
        $page_message = "";

        return view('report-perms-and-roles-by-users', compact('page_title', 'page_description', 'page_message'));
    }

    public function report_perms_and_roles_by_users_data(Request $request)
    {
        GridEncoder::encodeRequestedData(new ReportPermissionsAndRolesByUsersRepository(), $request->all());
    }

    public function test_acl_home()
    {
        $page_title = "ACL test Home";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This is the home page of all ACL tests.";

        return view('test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_do_not_load()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route should not be loaded into the list of application routes.";

        return view('test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_no_perm()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route does not have any permission assigned to it.";

        return view('test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_basic_authenticated()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route requires basic-authenticated perms.";

        return view('test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_guest_only()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route requires guest-only perms.";

        return view('test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_open_to_all()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route requires open-to-all perms.";

        return view('test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_admins()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route requires admins perms.";

        return view('test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_power_users()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route requires power-users perms.";

        return view('test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_flash_home()
    {
        $page_title = "Test Flash";
        $page_description = "Home for the flash test pages.";

        return view('test_flash_home', compact('page_title', 'page_description'));
    }


    public function test_flash_success()
    {
        $tmp = Audit::log(Auth::user()->id, "flash_test", "Testing audit with flash success.");

        $page_title = "Flash test";
        $page_description = "Testing the flash mechanism with a success level";

        Flash::success('This is a success message!');

        return view('test_flash_xxx', compact('page_title', 'page_description'));
    }

    public function test_flash_info()
    {
        $page_title = "Flash test";
        $page_description = "Testing the flash mechanism with an info level";

        Flash::info('This is an info message!');

        return view('test_flash_xxx', compact('page_title', 'page_description'));
    }

    public function test_flash_warning()
    {
        $page_title = "Flash test";
        $page_description = "Testing the flash mechanism with a warning level";

        Flash::warning('This is a warning message!');

        return view('test_flash_xxx', compact('page_title', 'page_description'));
    }

    public function test_flash_error()
    {
        $page_title = "Flash test";
        $page_description = "Testing the flash mechanism with a error level";

        Flash::error('This is an error message!');

        return view('test_flash_xxx', compact('page_title', 'page_description'));
    }

}
