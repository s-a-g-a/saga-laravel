<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use App\announcements;
	//use Carbon\Carbon;

	class viewsController extends \crocodicstudio\crudbooster\controllers\CBController {


		public function getIndex(){
			if(CRUDBooster::myId() == null) CRUDBooster::redirectBack('Sorry Hackers','warning');
   
   //Create your own query 
   $posts=announcements::orderBy('created_at','desc')->paginate(3);
   $data = [];
   $data['page_title'] = 'Products Data';
   $data['result'] = DB::table('announcements')->paginate(1);

    
   //Create a view. Please use `cbView` method instead of view method from laravel.
   return view('viewannouncements',compact('posts'));
		}


    function postCurriculum(){
        $headers10 = array(
'Cookie: _winner_erp_session=6beab6e57ff610bd87d760eae3b91fff',
'Origin: http://estudent.astu.edu.et',
'Accept-Encoding: gzip, deflate',
'X-CSRF-Token: 5mHOP7oaFBrCmFCEdPnvCcrTzgOYmngQi3eeF6aTeHtx2hkLN1jpSBeJQH1tf/4Rsf3xfOvUTQ6+NaLe9mNXWA==',
'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Accept: */*;q=0.5, text/javascript, application/javascript, application/ecmascript, application/x-ecmascript',
'Referer: http://estudent.astu.edu.et/estudent/available_programs/index',
'X-Requested-With: XMLHttpRequest',
'Connection: keep-alive',



        ); 
        $strucId=request('structure_id');
        $data ='utf8=%E2%9C%93&structure_id='.$strucId.'&%5Bcurriculum_type%5D=Conventional&commit=Search+Programs';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://estudent.astu.edu.et/estudent/available_programs/index");
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers10);
$server_output = curl_exec ($ch);
$server_output=str_replace('$("#available_programs_list").html("', "", $server_output);
$server_output=str_replace('\n', "", $server_output);

$server_output=str_replace('\\', "", $server_output);
$server_output=str_replace('");', "", $server_output);
$server_output=str_replace('$("#available_programs_list").fadeIn(500);', "", $server_output);

$server_output=str_replace('/estudent/available_programs/show_curriculum?ct=Conventional&amp;id=',"/saga/curriculum?id=", $server_output);
      //return $server_output;

        if (CRUDBooster::myId()) {
        //return $server_output;
return view('curriculum',compact("server_output"));
        }
        return redirect(CRUDBooster::adminPath());
        

    }   
    function getCurriculum(){

        $id=request('id');
           if ($id=="") {
            $htmlContent="";
        }
        else{
            $htmlContent = file_get_contents("http://estudent.astu.edu.et/estudent/available_programs/show_curriculum?ct=Conventional&id=$id");
        
$htmlContent=str_replace('<span class="logo-mini">Adama Science and Technology University</span>', "", $htmlContent);
$htmlContent=str_replace('<span class="a"><img height="100px" src="/assets/astu3-1b8f6dad9c3d3877490dcb1a4512aab5a0917edbe7e2d80663284af152d44953.svg" alt="Astu3" />', "", $htmlContent);

$htmlContent=str_replace('<footer class="main-footer" style="','<footer class="main-footer" style="display:none;', $htmlContent);
$htmlContent=str_replace('<a href="/" class="logo" style="border-right: 0px;height:100px;width:100%;text-align: left;border-bottom: 1px inset #F9FAFC;">', "", $htmlContent);
$htmlContent=str_replace('<strong class="text-center"> Powered by
          <a href="http://www.wie.et"> <img height="40px" src="/assets/winnerlogo-d8ba6567ae904d1616c277194d65f7122c06da9c86b7b5dbaaca1af3b7ce5dfd.jpg" alt="Winnerlogo" /></a></strong>
      </footer>', "", $htmlContent);
$htmlContent=str_replace('$.widget.bridge(\'uibutton\', $.ui.button);', "", $htmlContent);
$htmlContent=str_replace('<script src="/assets/jquery.self-bd7ddd393353a8d2480a622e80342adf488fb6006d667e8b42e4c0073393abee.js?body=1"></script>
<script src="/assets/jquery_ujs.self-784a997f6726036b1993eb2217c9cb558e1cbb801c6da88105588c56f13b466a.js?body=1"></script>
<script src="/assets/twitter/bootstrap/transition.self-09ff30b1e8a93d1f7728b9855f55d9c9d8d5734c8861e0d8139994e50944572a.js?body=1"></script>
<script src="/assets/twitter/bootstrap/alert.self-a29e91e8cd3ddaba9bbc466901d53ec2127e9256b9b941905d525a3a716bd1a5.js?body=1"></script>
<script src="/assets/twitter/bootstrap/modal.self-72f95ffa1071297725a9ac91989693d56d1abf23f441a47455073b0da2857a5b.js?body=1"></script>
<script src="/assets/twitter/bootstrap/dropdown.self-9314126777c6be5443e37ea7f7967d7914d72b3e60449ba50edc967446373059.js?body=1"></script>
<script src="/assets/twitter/bootstrap/scrollspy.self-a155b9d4b2f978905f0326c0f6635e1134fe91c6bfbfcbad079fa24a9fef2b0e.js?body=1"></script>
<script src="/assets/twitter/bootstrap/tab.self-122235057fbd4c6c7da377d59dc58f47b44cb1088a2e38e6ee6ce9d8ac29a26a.js?body=1"></script>
<script src="/assets/twitter/bootstrap/tooltip.self-11cf547be953f25f511cec668f6690473fd97b2f65502e4032f4030999a3f0c3.js?body=1"></script>
<script src="/assets/twitter/bootstrap/popover.self-77d8e3a2499c1104ef146396a68b82469ee2bdb365199b874694698d10405e9a.js?body=1"></script>
<script src="/assets/twitter/bootstrap/button.self-a6cb16785434acb365ae426aef9f1fce05ed553cae7a965e4471c3da71509175.js?body=1"></script>
<script src="/assets/twitter/bootstrap/collapse.self-7dc8bfbc2fbfabd2bad62c58ff8ffeaf8f20fb87c7ca6cd35f06d4dc19632587.js?body=1"></script>
<script src="/assets/twitter/bootstrap/carousel.self-57eb8422043cf0a85b7a9dc6843916eb0a3e35b419c7798a5eb254b918997631.js?body=1"></script>
<script src="/assets/twitter/bootstrap/affix.self-d2b642d8fbfc1d7041e2edefd66683ada567a980789dcd6f94fddda0b33408b5.js?body=1"></script>
<script src="/assets/twitter/bootstrap.self-fbfa5ad7d9aa0afe439ec4ff3883acc4cb92b62cb67c40d674320c9aa1d4642d.js?body=1"></script>
<script src="/assets/jquery_nested_form.self-d38045d10ebdd28aac44152cb451796232091957b86b47bedad1ab171a3a12cd.js?body=1"></script>
<script src="/assets/jquery-ui-1.11.4/jquery-ui.min.self-b7c16443ccb48e80a35ea3f016e863c95427e8358a70bbe4137f45bfffdc915a.js?body=1"></script>
<script src="/assets/DataTables-1.10.12/media/js/jquery.dataTables.self-25bae4d573a2e6dfd68bdb66313462f2d45ba7269d61324ec40eef2089d65b3e.js?body=1"></script>
<script src="/assets/DataTables-1.10.12/media/js/dataTables.bootstrap.min.self-43f2842e069a48f99dcd27fe4e3ebc0988af9b86711ffdee302f4e02964fc54b.js?body=1"></script>
<script src="/assets/DataTables-1.10.12/extensions/Responsive/js/dataTables.responsive.min.self-2df69f53a77cbabda61dee33a5746440b0657dbb1bb95b9ed5c7100102dbb9c7.js?body=1"></script>
<script src="/assets/DataTables-1.10.12/extensions/Responsive/js/responsive.bootstrap.min.self-728acbb7ce76acb486e9b064caa04848f551374a4081160522a23a6ddc2288ed.js?body=1"></script>
<script src="/assets/DataTables-1.10.12/extensions/Buttons/js/dataTables.buttons.min.self-f1439a83e388115d7f3bc67c1dff3362efa9990533208d00006806ec9316016f.js?body=1"></script>
<script src="/assets/DataTables-1.10.12/extensions/Buttons/js/buttons.flash.min.self-f2857a65659683b064651ee0d5ad9eb6835aa2af703e9a60bb9dc1fa021ba322.js?body=1"></script>
<script src="/assets/DataTables-1.10.12/extensions/Buttons/js/jzip.self-f8b9c5100d1d5b6a84317f6f0848fcedbc9dccb44074e7a080c9c76082403bc0.js?body=1"></script>
<script src="/assets/DataTables-1.10.12/extensions/Buttons/js/buttons.colVis.self-a2410fb3f3245dd89d61a21b96d3b47e943324a221952fac2ebc8b4b0ee698af.js?body=1"></script>
<script src="/assets/DataTables-1.10.12/extensions/Buttons/js/pdf.self-0316a8044ce6c982756b9ca50a13b4bfce8c9b51da4c64d7686165cade6cbf81.js?body=1"></script>
<script src="/assets/DataTables-1.10.12/extensions/Buttons/js/pdf-fonts.self-8f2d554ee1ccf0fe24f70ab5ec47bf58a7efe3f42727523bd97c1820a9348192.js?body=1"></script>
<script src="/assets/DataTables-1.10.12/extensions/Buttons/js/buttons.html5.min.self-941cf2c412ce7d7619b3dde4de45a9b0f42beeac2075f858bd2c39f5a3c7a597.js?body=1"></script>
<script src="/assets/DataTables-1.10.12/extensions/Buttons/js/buttons.print.min.self-a9d2c802f09b4e898e7f6457dcd7c0fe7179e76fc3a012923592594a24c62a2b.js?body=1"></script>
<script src="/assets/DataTables-1.10.12/extensions/Buttons/js/buttons.bootstrap.self-90be87cac5d5938024ef3887b747d3f70043bbe41fee7818451b0bd1484c4c28.js?body=1"></script>
<script src="/assets/buttons.self-1e135afb54bf948ed616b7e518ea9f59c8edad95a2d1dfbae8adc60b167c5f6c.js?body=1"></script>
<script src="/assets/jquery-calendar/jquery.plugin.self-0d0888c3cd8e2bae4bd5eb078054ff8f2a90db0ca54fe07ba02efdbae0b50830.js?body=1"></script>
<script src="/assets/jquery-calendar/jquery.calendars.self-0db94bbbba70de1711ab019c4150efb507e12a6341975612f6d1de5c63a43ea2.js?body=1"></script>
<script src="/assets/jquery-calendar/jquery.calendars.plus.self-fbe51801ec581c120c429b8144f751177c461279f01a2c302dbd5925d7c297c1.js?body=1"></script>
<script src="/assets/jquery-calendar/jquery.calendars.picker.self-7aa64608b95c9d3d1df93fa91131f93e479f990b48abd3489c07b7c3b5a66f82.js?body=1"></script>
<script src="/assets/jquery-calendar/jquery.calendars.ethiopian.self-bf7a04310868d0e5bc7e70c547f651d55f9352bcd8ac73a63aa19fa8f96c8590.js?body=1"></script>
<script src="/assets/jquery-calendar/jquery.calendars.ethiopian-am.self-60e4bddfe397b2640094a8bc8c38c714de41f21dcc2b580bb9bb4d5fe9d9d989.js?body=1"></script>
<script src="/assets/calendars.self-d088784b7ecb87f1ea17e6f982fa968ffefcc07b79de6ecc548fc00242868da6.js?body=1"></script>
<script src="/assets/jquery.cookie.self-54e6d8430dd88cc11eac236e182381bfa3c8b330d5931d49194ead92dc2ee600.js?body=1"></script>
<script src="/assets/global.self-13c0ba2f9261c027abd550ac81d51b5d00b2d100c6f39528eb94a19db463a174.js?body=1"></script>
<script src="/assets/menu.self-3191bd39f863fc3ccf42c432b2df93fe9db421b6b3ab29dedb18281245887056.js?body=1"></script>
<script src="/assets/jquery.jOrgChart.self-2cbc1f7c8e4931bca53de318b15b27afabf1e7d5a58874cefde92311acf39f91.js?body=1"></script>
<script src="/assets/user_roles.self-9bf18319c43f776c11a7bcc0a2eb975a22289fdf0c78f84b3bd0e63778f33eac.js?body=1"></script>
<script src="/assets/employees.self-4156a93dbdb6f954c6ca856a0811241ee90fb4e94dcb8aed5bee5b12452a1ed4.js?body=1"></script>
<script src="/assets/people.self-2a630fcc7e4004d104478f65692807ba298c537ff1b6d032d49247575515a577.js?body=1"></script>
<script src="/assets/modals.self-7f2f91a4a1c6606bde239b25f516da2a0d9832ea42883556de6e58a24bfa42de.js?body=1"></script>
<script src="/assets/educations.self-0264fe3a439dea8dd811e2076460407c0e9f66d9f7df2e491338aa2bee74a64f.js?body=1"></script>
<script src="/assets/select2.self-3d0dca634dc5f4aee8c2dddef05674d9a674214500fd7e89959dc9e7251bb717.js?body=1"></script>
<script src="/assets/select.self-bd18735ae6209a52ad76a1c20593f225698e7863afa74c4fc157c1f057ffbf5e.js?body=1"></script>
<script src="/assets/audit_log.self-59ded56b344c77ed4554d550588926b4c284aff82a973eb261249f1f6e253d9a.js?body=1"></script>
<script src="/assets/autocomplete-rails.self-864cc2192e74efa2e1c7085b81760919e66ec063803a4d4aa3f32a905a63bf99.js?body=1"></script>
<script src="/assets/adminlte.self-7b02b7f52af69534465dcf697b3490549e0ba81d9d2a857385ea690de60175ad.js?body=1"></script>
<script src="/assets/multi_date.self-4e4a5083aea580dbd16ed1b048595f6f2e0992ce362cc31157327c434fa32986.js?body=1"></script>
<script src="/assets/datatable_init.self-29a84f448415ade156e632479896a918f6846f7e9265649f642707ef92472661.js?body=1"></script>
<script src="/assets/ckeditor/init.self-2f3e80b764bc18c9362e6f3326e1f32d4a8bdceff67345a3453a93b111626ff3.js?body=1"></script>
<script src="/assets/ckeditor/ckeditor.self-3bf56bf393bee65859bc77ba70e26a11bb7e07f0991ba908d1e9a37446e7022b.js?body=1"></script>
<script src="/assets/utils_widgets.self-d2154042c969c0502c465d81a0dec8d9d1df123d1d9d0c451bebc68275f6dc50.js?body=1"></script>
<script src="/assets/moment.self-0da3eb4ebf8fb8c3113d89afb90e5b7a87760d21b5b39a405a51fe05c8e40fd8.js?body=1"></script>
<script src="/assets/bootstrap-datetimepicker.self-6ead78beb12f0003df8dd07cb3ab3543d2573653caf0ee0d4fda4da49532f128.js?body=1"></script>
<script src="/assets/pickers.self-14e4603dfad235a886231a39de786bcf942ff4faae5f61feedc07da16c18af58.js?body=1"></script>
<script src="/assets/bootstrap3-typeahead.min.self-78fcb50a4b38a41b52a51f8662133e39712218bbacbb337469c3ed64bb88ae9d.js?body=1"></script>
<script src="/assets/bootstrap3-autocomplete-input.self-13ad341cb77bf56acea68254dfea780491f60b71430d47ef8f36a4dfdd9d156a.js?body=1"></script>
<script src="/assets/application.self-fa88fbd83fe63098d836b81090204c2409c06e85ced0efd213c85602d13a42ea.js?body=1"></script>
    <script src="/assets/estudent/report_utils/add_course.self-ea3f75ed7731c325d464cedac4bcc867656b22ab4719997918a2d2d97c5dea7d.js?body=1"></script>
<script src="/assets/estudent/report_utils/admission/admission.self-07c083968a2e5105e8203cea947468af328486832ce1db69b91cbb2a9c872e43.js?body=1"></script>
<script src="/assets/estudent/report_utils/applicants.self-2726c0bd8bf285a31d8b5cb1ccbb468407f329351ab91270df6f51bf52b7f707.js?body=1"></script>
<script src="/assets/estudent/report_utils/cafeteria.self-72981341496358dbe1c1fe88ede71c7920d4cf774a43ba56586346b9d1df470a.js?body=1"></script>
<script src="/assets/estudent/report_utils/calculate_gpa/dep.self-87a5b3ddb8a6b998a60f5107e423b7ba273d2dea66f98d9bb9f9b6f83cc92bd8.js?body=1"></script>
<script src="/assets/estudent/report_utils/calculate_gpa/programlist.self-916cbd0e6c43f845f66159f16ec5c19792f671c63aeabfaf399560ccc04dd437.js?body=1"></script>
<script src="/assets/estudent/report_utils/calculate_gpa/section.self-e28a2faf18486668c24cdfcff75a9f03b4d3d38c5c7b8db4eedd9490587ccba6.js?body=1"></script>
<script src="/assets/estudent/report_utils/certeficate/cert_dep.self-be768d6d07bb30d0ae70e7ebc934005147ada089a77a4e1d6594e718b5724ae8.js?body=1"></script>
<script src="/assets/estudent/report_utils/certeficate/costsharing_dep.self-6756d8bb62af77ec099d1da0ff891529229de698043964f7e00b643ef2f4d5c8.js?body=1"></script>
<script src="/assets/estudent/report_utils/certeficate/depts_for_search.self-b73b3d0ec1c500220b7f0bdf2cabe4f49569ca58dd2cfad353792a07bdd256f6.js?body=1"></script>
<script src="/assets/estudent/report_utils/certeficate/prog_for_search.self-0264851142b99fcc52a710e435134b39eefa1248d87358a9ada54ba03f71d1f8.js?body=1"></script>
<script src="/assets/estudent/report_utils/certeficate/programlist.self-5616689be2cc59cafd89af4fab1f7d49a359c2d76fa770bef278d16a5b2a5956.js?body=1"></script>
<script src="/assets/estudent/report_utils/cost_sharing.self-6938ed0cd3f54b7a5f05ff55b555c22d763a3270773d733925cb6c68f30c1189.js?body=1"></script>
<script src="/assets/estudent/report_utils/course/courses.self-da470e29d65d74334c119221a1087286e348f04a9fafc0881748ebbb62662a58.js?body=1"></script>
<script src="/assets/estudent/report_utils/course_add_drop/load_sections.self-5883ca8f5c672f9d1397516dfe4b1f08b1c6b20342d07e1dcf6e3e04166b3416.js?body=1"></script>
<script src="/assets/estudent/report_utils/course_assignment/department.self-ae84d043457eb5461b48bc448f3e208ef9d776503707e3c91440b8592f7ed88b.js?body=1"></script>
<script src="/assets/estudent/report_utils/course_assignment/department_list.self-fac0fc0c340222d3b3a1969efa5b8eda9bac6235a17eda8d31a33a5a6ec39e7f.js?body=1"></script>
<script src="/assets/estudent/report_utils/course_assignment/program.self-20c35290821ec8a7a4316a3e5b535e2eee37d2b3b498cd46b118382f744a4145.js?body=1"></script>
<script src="/assets/estudent/report_utils/course_enrollment.self-5df7b7cc2fa18e476914f7825a1afa0462b58ade0e8061a7e4e4ef9640a4b8e9.js?body=1"></script>
<script src="/assets/estudent/report_utils/course_offering/dep_cur_course.self-001c0300a4af2678c7cc8036935b5736620b27f705504f347eb992c034db93f0.js?body=1"></script>
<script src="/assets/estudent/report_utils/course_offering/depts.self-ba1d42458fca287daac844299cf35bcab2eb7f6bd5d6c1345fd97f0011af8d18.js?body=1"></script>
<script src="/assets/estudent/report_utils/curriculum_courses.self-2e4bc0f51a412e5eb28a2d2c7869b9896b617e6d5c82fc775b5bcb4af728b9b0.js?body=1"></script>
<script src="/assets/estudent/report_utils/gate.self-f3b31b68d4964fe564b087b16ebf76734bddc4490e2efd389298adee9e5766e5.js?body=1"></script>
<script src="/assets/estudent/report_utils/grade.self-84278d15f2c9cee85de0e3b83affce1469238b8fb9be2181c202858978243680.js?body=1"></script>
<script src="/assets/estudent/report_utils/grade_scale/classyears.self-804389cd09ca1530d6912d60a61ee453c531312f3e3630cb34399d5b115043f4.js?body=1"></script>
<script src="/assets/estudent/report_utils/grade_scale/department.self-90869cf518df4d9f3a8ed4c5fe4f2636e065c65fe69b1982433698fe34016e6a.js?body=1"></script>
<script src="/assets/estudent/report_utils/grade_scale/department_list.self-f4e1a2767683ef4696a90f8e0ad9c8592556aa4cd2af3384648a37d12d6b5357.js?body=1"></script>
<script src="/assets/estudent/report_utils/grade_scale/grade_report.self-8f19a0f4c085b9aeacdbfc7f456b8853d0492b381be8fafb4112961ca0937514.js?body=1"></script>
<script src="/assets/estudent/report_utils/grade_scale/grade_scale.self-cf5aecc5f04858229fd4ae5869807e39986727bb2f9ed47fe43088778f167191.js?body=1"></script>
<script src="/assets/estudent/report_utils/grade_scale/program_list.self-d3c23aea72d4743835bc964e0e25a1816a021cc1130513b47c168c284d41a470.js?body=1"></script>
<script src="/assets/estudent/report_utils/module_course.self-5e8ffa15cc8b142aa9bacf419019880f8fe6fb860891c3b74d7f6564caba6301.js?body=1"></script>
<script src="/assets/estudent/report_utils/module_curriculum.self-12bac5638429e29569377eda8c667b6db5598ee5a0262ba3f6b9f307866691dc.js?body=1"></script>
<script src="/assets/estudent/report_utils/moe_data_import/stud_search_section.self-ffa49ff110866f3a5007c8849a495c10fe95bdb000f713b0f44c60bf1c487dbe.js?body=1"></script>
<script src="/assets/estudent/report_utils/penality.self-1cc1aba7d8755dff1456006c0b536d9a60d1f9338e7cc4043309fd1328a8d61d.js?body=1"></script>
<script src="/assets/estudent/report_utils/period/class_scheduler_dept.self-0a7f5c8e8cd948565ad3d97fe655ffb8e2c7be83767378bfea1eb8c0f24199f9.js?body=1"></script>
<script src="/assets/estudent/report_utils/period/class_stud_programs.self-0264851142b99fcc52a710e435134b39eefa1248d87358a9ada54ba03f71d1f8.js?body=1"></script>
<script src="/assets/estudent/report_utils/period/scheduled_deptt.self-3a94e431f6a60ab59698aa01cd6b30cde8131ff1aed2cd4347e5762a7003fa15.js?body=1"></script>
<script src="/assets/estudent/report_utils/period/scheduler_dept.self-fae56a6323890739c098e18d4cfe9c5898c511c6cc596eb0c322c84f8da111bf.js?body=1"></script>
<script src="/assets/estudent/report_utils/period/scheduler_pro_list.self-0264851142b99fcc52a710e435134b39eefa1248d87358a9ada54ba03f71d1f8.js?body=1"></script>
<script src="/assets/estudent/report_utils/period/stud_programs.self-0264851142b99fcc52a710e435134b39eefa1248d87358a9ada54ba03f71d1f8.js?body=1"></script>
<script src="/assets/estudent/report_utils/registration_confirmation.self-2172406db98f7c796c034824c2a9a674d8ecbef8961cfc291c6f782f98d8b4b0.js?body=1"></script>
<script src="/assets/estudent/report_utils/reports.self-e811b40a3eb1c5dbc9fb0d278b023d72743368dff368d54416712a4b3ef72192.js?body=1"></script>
<script src="/assets/estudent/report_utils/section/department_for_registered.self-59bd45d0aca79cf0b9fe68d7cf5cc95073e81b109ab9d0b4201e0ea5fe92f20b.js?body=1"></script>
<script src="/assets/estudent/report_utils/section/departments.self-edf47beeff0e50d53f5aa74ca782ca89b39fc280ea99345ee3100dcac32fa11b.js?body=1"></script>
<script src="/assets/estudent/report_utils/section/list_sections.self-f383cf819868565cc94985ed5cf24a766903c4261bb2c765a3de83dfd397d0da.js?body=1"></script>
<script src="/assets/estudent/report_utils/section/regis_section.self-2a6480bba952cea042d6a1328f85e37c861132db2faa7a5412aa828c70fa260a.js?body=1"></script>
<script src="/assets/estudent/report_utils/section/registered_students_programs.self-0264851142b99fcc52a710e435134b39eefa1248d87358a9ada54ba03f71d1f8.js?body=1"></script>
<script src="/assets/estudent/report_utils/section/sec.self-945e0802e47df9de5d2b18728086c160f4bd0de07e3990aba1dbee12b98953b0.js?body=1"></script>
<script src="/assets/estudent/report_utils/section/sections.self-7fb8f78808a0597eac681aa0c566453da4532a58d36608c8d7b44bad8e36ff4f.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/assigned_instructors.self-1498b8d84dc4095a78abbc1f344d5fea509ac02a311103e7e2b10b6c335dfac4.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/campus_list.self-189e977bad18f7f8196763c8c86c5d860a34ac28710ab0c98e0acfeaf739aab4.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/clear_pro_list.self-2c38d9f6b9184f8b10fd32da0085f136cb86af7ec3b2d33f6f1f6601da75f634.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/cleared_dept.self-e9bdc041780b1ba22834234b4ab6ea66ae17ed41b6e8e944e6e1bf0b730d2c29.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/dep_to_warned.self-a4e625069df13ed10694ae4e72e7d3f54989791c14a72b20e73cb0fe11d54d39.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/depar_to_graduated.self-81b99e4fe8212b198a760df4657e1e6643fa538e941f4d995e8809f97d6fb44c.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/department_list.self-fac0fc0c340222d3b3a1969efa5b8eda9bac6235a17eda8d31a33a5a6ec39e7f.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/departments_to_transferred.self-025fce23d0013b7e44560c175985fcba9d43a0494ec749034beb1488ccf55d6a.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/departs.self-fd3671d719d3b98d31e62489b3371e605947158fbcbdd7ad9ac9e281a1c28e6f.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/depts.self-e087d079ab47f561a92535464c5c08728528a41f34c69d61b2bc9eec725aec33.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/depts_to_cont_warning.self-9a7e14f3e7905b7055269a60031dceb17a2fd8dbbe1d47a135bf0c354f7f9d60.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/depts_to_promoted.self-4fe60faddd7f3897a70f88eabeb731767513fea2d5d6238d7bdcd6da8f28370c.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/deptt_to_dismissed.self-c3830a5e19579a2a4e3b64d06ab2b31243ca8316e4da5b8ec0a5e506abae5dec.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/dismissed_list.self-0264851142b99fcc52a710e435134b39eefa1248d87358a9ada54ba03f71d1f8.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/grad_list.self-2c38d9f6b9184f8b10fd32da0085f136cb86af7ec3b2d33f6f1f6601da75f634.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/grade_report_to_hod.self-b4031fac61d36cc3ffe5ac4512430b801be178eb860d33d67120c6545e3fdbf5.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/graduates_department.self-bf0440a0e41fb028eba5bdc6acb7c14433ed005a7dc9b5814c3041924ec028e7.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/graduates_pro_list.self-0264851142b99fcc52a710e435134b39eefa1248d87358a9ada54ba03f71d1f8.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/grd_dep_list.self-5a472806463a60d75aace81a52d6fa4e983cb02385625e2367b2b0bc4e8c219c.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/list_sections.self-a76fc28b7ec8be2a5a494299bd946331beffd66a4fe0c825985fda78bf512cbf.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/regis_dept.self-c9ecca7698db183d9b6afab78260bba4cc86275c70a9c53c197e81dd8fd66e3e.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/report_on_academic_status.self-6e5b893b16e1d313b7d0fb1e7eca34f58a4bb22a64fc3145d963b4876ebfe0b1.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/resection.self-a6d8f3f9ebf056d14f86b53776b17d972cbc075a72712665026689df1f589f36.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/section.self-c74b4517d208f288d99d5c13d753995070c29bc041b9a41518b1fd14da3cb5f4.js?body=1"></script>
<script src="/assets/estudent/report_utils/statistical_report/student_graduate.self-0264851142b99fcc52a710e435134b39eefa1248d87358a9ada54ba03f71d1f8.js?body=1"></script>
<script src="/assets/estudent/report_utils/student/academic_status.self-76c776851a8631573643ada7c2bbae897e712efa32dcbd7735f4cdce1e6e6ba8.js?body=1"></script>
<script src="/assets/estudent/report_utils/student/enrollment_dept.self-303aa305bec61e17f75edad2afdd64d58a9e559eede06161c31af424e8a512b1.js?body=1"></script>
<script src="/assets/estudent/report_utils/student/enrollment_history.self-bec792a8844199353e7e17a97233620033c7a1aeb708df1882272be8d3f38a15.js?body=1"></script>
<script src="/assets/estudent/report_utils/student/enrollment_status.self-77284a010da7e228cd14240aed854963159bbf0cac1fb71c3c0a8a68d3b161d1.js?body=1"></script>
<script src="/assets/estudent/report_utils/student/list_section.self-29a90c4321ec9a6fbddc5274f3ffaae93a10057c569292c831049f382c06cce1.js?body=1"></script>
<script src="/assets/estudent/report_utils/student/prog_for_enrollment.self-0264851142b99fcc52a710e435134b39eefa1248d87358a9ada54ba03f71d1f8.js?body=1"></script>
<script src="/assets/estudent/report_utils/student_record/department.self-63e557c7fa4099b0efeb0749e6a6e9656b07be70d5108937f71a9d4909d91256.js?body=1"></script>
<script src="/assets/estudent/report_utils/student_record/departments_to_senate.self-3ace9b4652b3b60c3065058930e21915a5dbb98732f97632f665875ce1551264.js?body=1"></script>
<script src="/assets/estudent/report_utils/student_record/graduated_dept.self-d65cf597930b383c770eca820279f8eed4e84ce791def8e3b57dff24651ec85b.js?body=1"></script>
<script src="/assets/estudent/report_utils/student_record/graduating_programs.self-cfebba62b51295507a9b858a1e132de0acf68ad0db4bf518a2bc2ab047c83d7e.js?body=1"></script>
<script src="/assets/estudent/report_utils/student_record/list_of_programs.self-09039edad7c3b7b190809826c4916a2a7aa993f7edd886dd58786ef4f468852a.js?body=1"></script>
<script src="/assets/estudent/report_utils/student_record/programs.self-82207786484c484dbd95f0970227319eda590997c725ab6722355a78fcbcfdf1.js?body=1"></script>
<script src="/assets/estudent/report_utils/student_record/senate_graduate_list.self-0264851142b99fcc52a710e435134b39eefa1248d87358a9ada54ba03f71d1f8.js?body=1"></script>
<script src="/assets/estudent/report_utils/student_record_info/depts_for_search.self-5417e6a9d907c07a31e4f33ca8f7859adbf92246faeb7e5bac4148801aaddbae.js?body=1"></script>
<script src="/assets/estudent/report_utils/student_record_info/gcr_department.self-a99963d133fda12526a72bc8957ef7fed3984f8332046d8876338f23b61619fc.js?body=1"></script>
<script src="/assets/estudent/report_utils/student_record_info/prog_for_search.self-0264851142b99fcc52a710e435134b39eefa1248d87358a9ada54ba03f71d1f8.js?body=1"></script>
<script src="/assets/estudent/report_utils/student_record_info/programs_list_to_gcr.self-0264851142b99fcc52a710e435134b39eefa1248d87358a9ada54ba03f71d1f8.js?body=1"></script>
<script src="/assets/estudent/report_utils/student_record_info/stud_search_section.self-df16df25122e897ffb11559be5562325048a0b2e4247f248de92e0db0f534941.js?body=1"></script>
<script src="/assets/estudent/report_utils/student_record_information.self-81697c40dc6d36d00c408b683e63103c3b90642904a3c47a6e210e8188638e0c.js?body=1"></script>
<script src="/assets/estudent/report_utils/transfer/department.self-90869cf518df4d9f3a8ed4c5fe4f2636e065c65fe69b1982433698fe34016e6a.js?body=1"></script>
<script src="/assets/estudent/report_utils/transfer/department_list.self-098b9df447c9d06866cfe3f500170adb2d16db28aea2da519a67a4075d5bc372.js?body=1"></script>
<script src="/assets/estudent/report_utils/transfer/list_section.self-cba64e3d0798ab1073bd0c07773fa5de3810d737fbffc380ef8abeab8892e676.js?body=1"></script>
<script src="/assets/estudent/report_utils/transfer/program.self-fb40089fd839399ef376bc3df8985eff345cea65f924a0f0d7ac9ebaf74bd680.js?body=1"></script>
<script src="/assets/estudent/report_utils/transfer/transfer.self-16616928eca0fbaedd8493a5e34d05b2f4b32b63fab1d632eb0d4147c8fc3397.js?body=1"></script>
<script src="/assets/estudent/id_card/id_card_class_year.self-1dcb726a8b98bedf7abdc757b1cf2a26372f67efee0b6acdb48976045aafab42.js?body=1"></script>
<script src="/assets/estudent/id_card/id_card_department.self-9b224f017dcef589d4ca25af12ebe6f66859f9fcf9f7dac6c9036e1ada97fe5f.js?body=1"></script>
<script src="/assets/estudent/id_card/id_card_program.self-308cd0097512ef6c6018f2baea17b3d42a313872ea5673e82e7d9627613be117.js?body=1"></script>
<script src="/assets/estudent/global.self-0bb86a107c8d6b7633abec6988426660b21dcbb6dca1c70128f0984b37007e26.js?body=1"></script>
<script src="/assets/estudent/module_curriculum.self-12bac5638429e29569377eda8c667b6db5598ee5a0262ba3f6b9f307866691dc.js?body=1"></script>
<script src="/assets/estudent/grade_changes.self-95fed72cffe51fbb6d665065caa40a7613bc9e0e602d75deb1885fd6a089a055.js?body=1"></script>
<script src="/assets/estudent/dormitory_placements.self-e0a3185b8a1db2f4fc56c29100d96b4d31bb9c4642b7a1264d224f5e9d2396f5.js?body=1"></script>
<script src="/assets/estudent/applicant_lists.self-2ec83319ce9ccc904e53116a3532fc3f42bfb1d116b4a10722fc27346c472426.js?body=1"></script>
<script src="/assets/estudent/payments.self-f8b5706dcfed8e30bd7f4d408eca2763c897e280248838caf431d1ca564d0c02.js?body=1"></script>
<script src="/assets/estudent/theses.self-4584fff7468965aa0bd769000e8a71b3366b2d61964d472c444d79f0377d6e19.js?body=1"></script>
<script src="/assets/estudent/graduation_requirements.self-9298699cad9cf06b23529164ce0240522486753b2c3b32c218b4d3d8a4900ddf.js?body=1"></script>
<script src="/assets/estudent/eschedule/class_schedules.self-4f8aa6f8870f3883dbc667f4fa606945a37bedaa926173e2561e10ef9066bba0.js?body=1"></script>
<script src="/assets/estudent/eschedule/settings.self-19a187bec6cdb96d6de80a61c16c857c613536adf9138476bd367db38d282635.js?body=1"></script>
<script src="/assets/estudent/application.self-f9796f10051646d52c962c89fde70b27fbcf561d9a8bdf45a5661cc7ba111833.js?body=1"></script>
<script>', "", $htmlContent);
}

        return view('curriculum',compact("htmlContent"));

    }   
    public function postCalander()
    {
        $admission_id=request('admission_id');
        //return request('admission_id');
        if (!$admission_id=="") {
         $admission_id=request('admission_id');            # code...
        }
        else
            $admission_id=1;
        
        $headers10 = array(


'Origin: http://estudent.astu.edu.et',
'X-CSRF-Token: bELvdD6N0nWFLTJpXrDOfhwNu+rRsgEJXktSzgAMj5hqrFPi3HBZAm7EyteO3Bnoqr8ijunMPJWnzDWaAzxtSQ==',
'X-Requested-With: XMLHttpRequest',
'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36',
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'Referer: http://estudent.astu.edu.et/estudent/academic_calendar_events/index',
'Accept-Encoding: gzip, deflate',
'Accept-Language: en-US,en;q=0.9',
'Cookie: _winner_erp_session=5d4bafd6f2e6828432f94fadc5b42f07',
'Connection: keep-alive'
        ); 
        $data ='utf8=%E2%9C%93&%5Badmission_id%5D='.$admission_id.'&commit=Search';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://estudent.astu.edu.et/estudent/academic_calendar_events/index");
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers10);
$server_output = curl_exec ($ch);

curl_close ($ch);

$server_output =str_replace("\\n", "", $server_output);
$server_output =str_replace("\\", "", $server_output);

$server_output =str_replace('$("#academic_calendars_list").html("', "", $server_output);

$server_output =str_replace('");',"", $server_output);
$server_output =str_replace('$("#academic_calendars_list").fadeIn(500);',"", $server_output);
        

        if (CRUDBooster::myId()) {
         //return request('admission_id');
return view('calander',compact("server_output"));   
        }
        return redirect(CRUDBooster::adminPath());
    }

public function getMap(){

	return view('map');
}


	}