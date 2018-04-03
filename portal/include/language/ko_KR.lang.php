<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

	

$app_list_strings = array (
  'account_type_dom' => 
  array (
    '' => '',
    'Analyst' => '분석가',
    'Competitor' => '경쟁사',
    'Customer' => '고객',
    'Integrator' => '완성자',
    'Investor' => '투자자',
    'Other' => '기타',
    'Partner' => '파트너',
    'Press' => '기자 및 출판사업자',
    'Prospect' => '잠재 고객',
    'Reseller' => '재판매사업자',
  ),
  'activity_dom' => 
  array (
    'Call' => '전화상담',
    'Email' => '이메일',
    'Meeting' => '회의',
    'Note' => '노트',
    'Task' => '업무과제',
  ),
  'bopselect_type_dom' => 
  array (
    'Equals' => '동일',
  ),
  'bselect_type_dom' => 
  array (
    'bool_false' => '아니오',
    'bool_true' => '예',
  ),
  'bug_priority_dom' => 
  array (
    'High' => '높음',
    'Low' => '낮음',
    'Medium' => '보통',
    'Urgent' => '긴급',
  ),
  'bug_resolution_dom' => 
  array (
    '' => '',
    'Accepted' => '수락',
    'Duplicate' => '복제하기',
    'Fixed' => '고정',
    'Invalid' => '무효',
    'Later' => '추후처리',
    'Out of Date' => '기간만료',
  ),
  'bug_status_dom' => 
  array (
    'Assigned' => '배정',
    'Closed' => '완료',
    'New' => '새 파일',
    'Pending' => '보류중',
    'Rejected' => '거부',
  ),
  'bug_type_dom' => 
  array (
    'Defect' => '결함',
    'Feature' => '기능',
  ),
  'call_direction_dom' => 
  array (
    'Inbound' => '수신',
    'Outbound' => '발신',
  ),
  'call_status_dom' => 
  array (
    'Held' => '완료',
    'Not Held' => '취소',
    'Planned' => '계획',
  ),
  'campaign_status_dom' => 
  array (
    '' => '',
    'Active' => '활동중',
    'Complete' => '완료',
    'In Queue' => '대기중',
    'Inactive' => '중지',
    'Planning' => '계획중',
    'Sending' => '전송',
  ),
  'campaign_type_dom' => 
  array (
    '' => '',
    'Email' => '이메일',
    'Mail' => '우편',
    'Print' => '출력하기',
    'Radio' => '라디오광고',
    'Telesales' => '전화영업',
    'Television' => '텔레비젼 광고',
    'Web' => '인터넷',
  ),
  'campainglog_activity_type_dom' => 
  array (
    '' => '',
    'contact' => '연락처 새로 만들기',
    'invalid email' => '반송 메세지, 유효하지 않은 이메일',
    'lead' => '주 예비고객 새로 만들기',
    'link' => '링크확인',
    'removed' => '수신거부',
    'send error' => '반송 메세지, 기타',
    'targeted' => '메세지 전송/시도',
    'viewed' => '수신확인 메세지',
  ),
  'campainglog_target_type_dom' => 
  array (
    'Contacts' => '연락처',
    'Leads' => '주 예비고객',
    'Prospects' => '목표 고객',
    'Users' => '사용자',
  ),
  'case_priority_dom' => 
  array (
    'P1' => '높음',
    'P2' => '보통',
    'P3' => '낮음',
  ),
  'case_relationship_type_dom' => 
  array (
    '' => '',
    'Alternate Contact' => '대체 연락처',
    'Primary Contact' => '기본 연락처',
  ),
  'case_status_dom' => 
  array (
    'Assigned' => '배정',
    'Closed' => '완료',
    'Duplicate' => '복제하기',
    'New' => '새 사례',
    'Pending Input' => '응답대기',
    'Rejected' => '거부',
  ),
  'checkbox_dom' => 
  array (
    '' => '',
    1 => '예',
    2 => '아니오',
  ),
  'contract_expiration_notice_dom' => 
  array (
    1 => '1일',
    3 => '3일',
    5 => '5일',
    7 => '1주',
    14 => '2주',
    21 => '3주',
    31 => '한달',
  ),
  'contract_payment_frequency_dom' => 
  array (
    'halfyearly' => '반년마다',
    'monthly' => '달 별',
    'quarterly' => '분기별',
    'yearly' => '연도별',
  ),
  'contract_status_dom' => 
  array (
    'inprogress' => '진행중',
    'notstarted' => '시작전',
    'signed' => '서명완료',
  ),
  'cselect_type_dom' => 
  array (
    'Does not Equal' => '동일하지 않음',
    'Equals' => '동일',
  ),
  'document_category_dom' => 
  array (
    '' => '',
    'Knowledege Base' => '지식 기반',
    'Marketing' => '마케팅',
    'Sales' => '영업',
  ),
  'document_status_dom' => 
  array (
    'Active' => '작동중',
    'Draft' => '임시 보관',
    'Expired' => '기간 만료됨',
    'FAQ' => '자주묻는질문',
    'Pending' => '보류중',
    'Under Review' => '검토중',
  ),
  'document_subcategory_dom' => 
  array (
    '' => '',
    'FAQ' => '자주묻는질문',
    'Marketing Collateral' => '판촉물 및 홍보포스터',
    'Product Brochures' => '제품 소책자',
  ),
  'document_template_type_dom' => 
  array (
    '' => '',
    'eula' => '소프트웨어 사용자 라이선스 동의서(EULA)',
    'license' => '라이센스 동의서',
    'mailmerge' => '우편 통합',
    'nda' => '기술정보 비밀유지 동의서(NDA)',
  ),
  'dom_cal_month_long' => 
  array (
    1 => '1월',
    2 => '2월',
    3 => '3월',
    4 => '4월',
    5 => '5월',
    6 => '6월',
    7 => '7월',
    8 => '8월',
    9 => '9월',
    10 => '10월',
    11 => '11월',
    12 => '12월',
  ),
  'dom_email_bool' => 
  array (
    'bool_false' => '아니오',
    'bool_true' => '예',
  ),
  'dom_email_distribution' => 
  array (
    '' => '없음',
    'direct' => '바로 배정',
    'leastBusy' => '최저 사용중',
    'roundRobin' => '탄원',
  ),
  'dom_email_editor_option' => 
  array (
    '' => '초기설정 이메일 형식',
    'html' => 'HTML 이메일',
    'plain' => '기본 문자 이메일',
  ),
  'dom_email_errors' => 
  array (
    1 => '바로 배정하는 아이템은 단 한명의 사용자만 선택할수 있습니다.',
    2 => '바로 배정하는 아이템은 확인된 것만 배정이 가능합니다.',
  ),
  'dom_email_link_type' => 
  array (
    '' => '시스템 초기설정 우편 고객',
    'mailto' => '외부 우편 고객',
    'sugar' => 'SugarCRM 우편 고객',
  ),
  'dom_email_server_type' => 
  array (
    '' => '--None--',
    'imap' => 'IMAP',
    'pop3' => 'POP3',
  ),
  'dom_email_status' => 
  array (
    'archived' => '보관됨',
    'closed' => '완료',
    'draft' => '임시저장됨',
    'read' => '읽음',
    'replied' => '답장발송됨',
    'send_error' => '전송 오류',
    'sent' => '발송됨',
    'unread' => '읽지않음',
  ),
  'dom_email_types' => 
  array (
    'archived' => '보관됨',
    'draft' => '임시저장됨',
    'inbound' => '수신',
    'out' => '발송됨',
  ),
  'dom_int_bool' => 
  array (
    1 => '예',
  ),
  'dom_mailbox_type' => 
  array (
    'bounce' => '반송 처리',
    'bug' => '결함 만들기',
    'contact' => '연락처 새로 추가하기',
    'pick' => '새로쓰기',
    'sales' => '주 예비고객 새로 추가하기',
    'support' => '사례 추가',
    'task' => '업무 추가하기',
  ),
  'dom_meeting_accept_options' => 
  array (
    'accept' => '수락',
    'decline' => '거절',
    'tentative' => '임시',
  ),
  'dom_meeting_accept_status' => 
  array (
    'accept' => '수락',
    'decline' => '거절',
    'none' => '없음',
    'tentative' => '임시',
  ),
  'dom_report_types' => 
  array (
    'detailed_summary' => '설명 및 요약',
    'summary' => '요약',
    'tabular' => '줄과 칸',
  ),
  'dom_switch_bool' => 
  array (
    '' => '아니오',
    'off' => '아니오',
    'on' => '네',
  ),
  'dom_timezones' => 
  array (
    -12 => '(GMT - 12) 국제 일부 변경선 서쪽',
    -11 => '미드웨이 제도, 사모아',
    -10 => '하와이',
    -9 => '알래스카',
    -8 => '샌프란시스코',
    -7 => '피닉스',
    -6 => '서스캐처원',
    -5 => '뉴욕',
    -4 => '산티아고',
    -3 => '부에노스아이레스',
    -2 => '중부 대서양',
    -1 => '아조레스 제도',
    1 => '마드리드',
    2 => '아테네',
    3 => '모스크바',
    4 => '카불',
    5 => '에카테린부르크',
    6 => '아스타나',
    7 => '방콕',
    8 => '퍼스',
    9 => '서울',
    10 => '브리스번',
    11 => '솔로몬 제도',
    12 => '오클랜드',
  ),
  'dom_timezones_extra' => 
  array (
    -12 => '국제 일부 변경선 서쪽',
    -11 => '미드웨이 제도, 사모아',
    -10 => '하와이',
    -9 => '알래스카',
    -8 => '태평양 표준시',
    -7 => '산지 표준시',
    -6 => '중앙 기준시',
    -5 => '동부 표준시',
    -4 => '산티아고',
    -3 => '부에노스아이레스',
    -2 => '중부 대서양',
    -1 => '아조레스',
    1 => '마드리드',
    2 => '아테네',
    3 => '모스크바',
    4 => '카불',
    5 => '에카테린부르크',
    6 => '아스타나',
    7 => '방콕',
    8 => '퍼스',
    9 => '서울',
    10 => '브리스번',
    11 => '솔로몬 제도',
    12 => '오클랜드',
  ),
  'dselect_type_dom' => 
  array (
    'Does not Equal' => '동일하지 않음',
    'Equals' => '동일',
    'Less Than' => '보다 더 적음',
    'More Than' => '보다 더 많음',
  ),
  'dtselect_type_dom' => 
  array (
    'Less Than' => '보다 적음',
    'More Than' => '보다 많음',
  ),
  'duration_intervals' => 
  array (
    15 => '15',
    30 => '30',
    45 => '45',
  ),
  'email_marketing_status_dom' => 
  array (
    '' => '',
    'active' => '활동중',
    'inactive' => '중지',
  ),
  'employee_status_dom' => 
  array (
    'Active' => '활동중',
    'Leave of Absence' => '휴직중',
    'Terminated' => '퇴사',
  ),
  'forecast_schedule_status_dom' => 
  array (
    'Active' => '활동중',
    'Inactive' => '중지',
  ),
  'forecast_type_dom' => 
  array (
    'Direct' => '바로 지시',
    'Rollup' => '계단식',
  ),
  'industry_dom' => 
  array (
    '' => '',
    'Apparel' => '의류 및 패션',
    'Banking' => '은행',
    'Biotechnology' => '생명공학',
    'Chemicals' => '석유화학',
    'Communications' => '정보통신',
    'Construction' => '건설',
    'Consulting' => '컨설팅',
    'Education' => '교육',
    'Electronics' => '전자',
    'Energy' => '자원',
    'Engineering' => '엔지니어',
    'Entertainment' => '엔터테이먼트',
    'Environmental' => '환경',
    'Finance' => '금융',
    'Government' => '정부',
    'Healthcare' => '의료 및 보건',
    'Hospitality' => '복지',
    'Insurance' => '보험',
    'Machinery' => '기계 및 부품',
    'Manufacturing' => '제조',
    'Media' => '신문/방송',
    'Not For Profit' => '비영리',
    'Other' => '기타',
    'Recreation' => '레크리에이션',
    'Retail' => '소매',
    'Shipping' => '배송',
    'Technology' => '지식',
    'Telecommunications' => '이동통신',
    'Transportation' => '운송',
    'Utilities' => '공공사업',
  ),
  'language_pack_name' => '영어(미국)',
  'layouts_dom' => 
  array (
    'Invoice' => '청구서',
    'Standard' => '사업제안',
    'Terms' => '납입 기한',
  ),
  'lead_source_dom' => 
  array (
    '' => '',
    'Cold Call' => '전화 영업',
    'Conference' => '컨퍼런스',
    'Direct Mail' => 'DM 우편',
    'Email' => '이메일',
    'Employee' => '사원추천',
    'Existing Customer' => '기존고객',
    'Other' => '기타',
    'Partner' => '파트너',
    'Public Relations' => '광고 및 홍보',
    'Self Generated' => '자연 발생',
    'Trade Show' => '전시회',
    'Web Site' => '웹사이트',
    'Word of mouth' => '입소문',
  ),
  'lead_status_dom' => 
  array (
    '' => '',
    'Assigned' => '배정',
    'Converted' => '전환됨',
    'Dead' => '만료됨',
    'In Process' => '진행중',
    'New' => '새 예비고객',
    'Recycled' => '다시배정됨',
  ),
  'lead_status_noblank_dom' => 
  array (
    'Assigned' => '배정',
    'Converted' => '전환됨',
    'Dead' => '만료됨',
    'In Process' => '진행중',
    'New' => '새 예비고객',
    'Recycled' => '다시배정됨',
  ),
  'meeting_status_dom' => 
  array (
    'Held' => '완료',
    'Not Held' => '취소',
    'Planned' => '계획',
  ),
  'messenger_type_dom' => 
  array (
    '' => '',
    'AOL' => 'AOL',
    'MSN' => 'MSN',
    'Yahoo!' => 'Yahoo!',
  ),
  'moduleList' => 
  array (
    'Bugs' => '오류 추적',
    'Cases' => '사례',
    'FAQ' => '자주묻는질문',
    'Home' => '홈',
    'KBDocuments' => '지식 기반',
    'Newsletters' => '소식지',
    'Notes' => '노트',
    'Teams' => '팀:',
    'Users' => '사용자',
  ),
  'moduleListSingular' => 
  array (
    'Bugs' => '오류',
    'Cases' => '사례',
    'Home' => '홈',
    'Notes' => '노트',
    'Teams' => '팀:',
    'Users' => '사용자',
  ),
  'mselect_type_dom' => 
  array (
    'Equals' => '동일',
    'in' => '중의 하나',
  ),
  'notifymail_sendtype' => 
  array (
    'SMTP' => 'SMTP',
  ),
  'opportunity_relationship_type_dom' => 
  array (
    '' => '',
    'Business Decision Maker' => '사업 결정권자',
    'Business Evaluator' => '사업 평가자',
    'Executive Sponsor' => '최고 후원자',
    'Influencer' => '영향권자',
    'Other' => '기타',
    'Primary Decision Maker' => '최고 결정권자',
    'Technical Decision Maker' => '실무 결정권자',
    'Technical Evaluator' => '실무 평가자',
  ),
  'opportunity_type_dom' => 
  array (
    '' => '',
    'Existing Business' => '기존 고객',
    'New Business' => '신규 고객',
  ),
  'order_stage_dom' => 
  array (
    'Cancelled' => '취소',
    'Confirmed' => '확인',
    'On Hold' => '보류',
    'Pending' => '보류중',
    'Shipped' => '배송됨',
  ),
  'payment_terms' => 
  array (
    '' => '',
    'Net 15' => '격주(달2회)',
    'Net 30' => '매달',
  ),
  'pricing_formula_dom' => 
  array (
    'Fixed' => '고정',
    'IsList' => '목록과 동일',
    'PercentageDiscount' => '목록에서 할인',
    'PercentageMarkup' => '경비 대비 이윤',
    'ProfitMargin' => '이윤 차액',
  ),
  'product_category_dom' => 
  array (
    '' => '',
    'Accounts' => '고객',
    'Activities' => '활동내역',
    'Bug Tracker' => '오류 추적',
    'Calendar' => '달력',
    'Calls' => '전화',
    'Campaigns' => '캠페인',
    'Cases' => '사례',
    'Contacts' => '연락처',
    'Currencies' => '화폐',
    'Dashboard' => '대시보드',
    'Documents' => '문서',
    'Emails' => '이메일',
    'Feeds' => '공급',
    'Forecasts' => '예상',
    'Help' => '도움말',
    'Home' => '홈',
    'Leads' => '주 예비고객',
    'Meetings' => '회의',
    'Notes' => '노트',
    'Opportunities' => '예비고객',
    'Outlook Plugin' => 'Outlook Plugin',
    'Product Catalog' => '제품 카달로그',
    'Products' => '상품',
    'Projects' => '프로젝트',
    'Quotes' => '견적',
    'RSS' => 'RSS',
    'Releases' => '발표',
    'Studio' => '작업실',
    'Upgrade' => '업그레이드',
    'Users' => '사용자',
  ),
  'product_status_dom' => 
  array (
    'Orders' => '주문',
    'Quotes' => '견적 완료',
    'Ship' => '배송됨',
  ),
  'product_status_quote_key' => '견적서',
  'product_template_status_dom' => 
  array (
    'Available' => '제고 있음',
    'Unavailable' => '품절',
  ),
  'project_task_priority_options' => 
  array (
    'High' => '높음',
    'Low' => '낮음',
    'Medium' => '보통',
  ),
  'project_task_status_options' => 
  array (
    'Completed' => '완료',
    'Deferred' => '연기',
    'In Progress' => '진행중',
    'Not Started' => '시작전',
    'Pending Input' => '응답대기',
  ),
  'project_task_utilization_options' => 
  array (
    25 => '25',
    50 => '50',
    75 => '75',
    100 => '100',
  ),
  'prospect_list_type_dom' => 
  array (
    'default' => '기본',
    'exempt' => '거부 목록 - ID',
    'exempt_address' => '거부 목록 - 이메일주소',
    'exempt_domain' => '거부 목록 - 도메인',
    'seed' => '신규배정',
    'test' => '테스트',
  ),
  'query_calc_oper_dom' => 
  array (
    '*' => '곱하기',
    '+' => '더하기',
    '-' => '빼기',
    '/' => '나누기',
  ),
  'quote_relationship_type_dom' => 
  array (
    '' => '',
    'Business Decision Maker' => '사업 결정권자',
    'Business Evaluator' => '사업 평가자',
    'Executive Sponsor' => '최고 후원자',
    'Influencer' => '영향권자',
    'Other' => '기타',
    'Primary Decision Maker' => '최고 결정권자',
    'Technical Decision Maker' => '실무 결정권자',
    'Technical Evaluator' => '실무 평가자',
  ),
  'quote_stage_dom' => 
  array (
    'Closed Accepted' => '계약성공',
    'Closed Dead' => '사업가능성 없음',
    'Closed Lost' => '계약실패',
    'Confirmed' => '확인',
    'Delivered' => '전달',
    'Draft' => '초안',
    'Negotiation' => '제안및교섭',
    'On Hold' => '보류',
  ),
  'quote_type_dom' => 
  array (
    'Orders' => '주문',
    'Quotes' => '견적',
  ),
  'record_type_display' => 
  array (
    'Accounts' => '고객',
    'Bugs' => '오류 및 장애',
    'Cases' => '사례',
    'Contacts' => '연락처',
    'Leads' => '주 예비고객',
    'Opportunities' => '예비고객',
    'ProductTemplates' => '제품',
    'Project' => '프로젝트',
    'ProjectTask' => '프로젝트 과제',
    'Quotes' => '견적',
    'Tasks' => '업무과제',
  ),
  'record_type_display_notes' => 
  array (
    'Accounts' => '고객',
    'Bugs' => '오류 및 장애',
    'Calls' => '전화',
    'Cases' => '사례',
    'Contacts' => '연락처',
    'Contracts' => '연락처',
    'Emails' => '이메일',
    'Leads' => '주 예비고객',
    'Meetings' => '회의',
    'Opportunities' => '예비고객',
    'ProductTemplates' => '제품',
    'Products' => '상품',
    'Project' => '프로젝트',
    'ProjectTask' => '프로젝트 과제',
    'Quotes' => '견적',
  ),
  'reminder_max_time' => '3600',
  'reminder_time_options' => 
  array (
    60 => '1분전',
    300 => '5분전',
    600 => '10분전',
    900 => '15분전',
    1800 => '30분전',
    3600 => '1시간전',
  ),
  'sales_probability_dom' => 
  array (
    'Closed Lost' => '계약실패',
    'Closed Won' => '획득 성공',
    'Id. Decision Makers' => 'ID 결정자',
    'Needs Analysis' => '분석 필요',
    'Negotiation/Review' => '협상/재검토',
    'Perception Analysis' => '인지 분석',
    'Proposal/Price Quote' => '사업제안 / 견적 제출',
    'Prospecting' => '잠재 고객',
    'Qualification' => '자격 부여',
    'Value Proposition' => '가치 제안',
  ),
  'sales_stage_dom' => 
  array (
    'Closed Lost' => '계약실패',
    'Closed Won' => '획득 성공',
    'Id. Decision Makers' => 'ID 결정자',
    'Needs Analysis' => '분석 필요',
    'Negotiation/Review' => '협상 / 재검토',
    'Perception Analysis' => '인지 분석',
    'Proposal/Price Quote' => '사업 제안/ 견적 제출',
    'Prospecting' => '잠재 고객',
    'Qualification' => '자격 부여',
    'Value Proposition' => '가치 제안',
  ),
  'salutation_dom' => 
  array (
    '' => '',
    'Dr.' => 'Dr.',
    'Mr.' => 'Mr.',
    'Mrs.' => 'Mrs.',
    'Ms.' => 'Ms.',
    'Prof.' => 'Prof.',
  ),
  'schedulers_times_dom' => 
  array (
    'completed' => '완료',
    'failed' => '실패',
    'in progress' => '진행중',
    'no curl' => '진행불가 : 사용가능한 cURL이 존재하지 않습니다.',
    'not run' => '실행시간이 초과하여 실행되지 않았습니다.',
    'ready' => '준비',
  ),
  'source_dom' => 
  array (
    '' => '',
    'Forum' => '포럼',
    'InboundEmail' => '이메일',
    'Internal' => '내부',
    'Web' => '인터넷',
  ),
  'support_term_dom' => 
  array (
    '+1 year' => '1년',
    '+2 years' => '2년',
    '+6 months' => '6개월',
  ),
  'task_priority_dom' => 
  array (
    'High' => '높음',
    'Low' => '낮음',
    'Medium' => '보통',
  ),
  'task_status_dom' => 
  array (
    'Completed' => '완료',
    'Deferred' => '연기',
    'In Progress' => '진행중',
    'Not Started' => '시작전',
    'Pending Input' => '응답대기',
  ),
  'tax_class_dom' => 
  array (
    'Non-Taxable' => '면세품',
    'Taxable' => '과세품목',
  ),
  'tselect_type_dom' => 
  array (
    14440 => '4시간',
    28800 => '8시간',
    43200 => '12시간',
    86400 => '1일',
    172800 => '2일',
    259200 => '3일',
    345600 => '4일',
    432000 => '5일',
    604800 => '1주',
    1209600 => '2주',
    1814400 => '3주',
    2592000 => '30일',
    5184000 => '60일',
    7776000 => '90일',
    10368000 => '120일',
    12960000 => '150일',
    15552000 => '180일',
  ),
  'user_status_dom' => 
  array (
    'Active' => '작동중',
    'Inactive' => '중지',
  ),
  'wflow_action_datetime_type_dom' => 
  array (
    'Existing Value' => '존재하는 가치',
    'Triggered Date' => '발생 날짜',
  ),
  'wflow_action_type_dom' => 
  array (
    'new' => '새 기록',
    'update' => '기록 업데이트',
    'update_rel' => '관련 문서 업데이트',
  ),
  'wflow_address_type_dom' => 
  array (
    'bcc' => '숨은 참조',
    'cc' => '참조',
    'to' => '받는 사람',
  ),
  'wflow_address_type_invite_dom' => 
  array (
    'bcc' => '숨은 참조',
    'cc' => '참조',
    'invite_only' => '초대자만',
    'to' => '받는 사람',
  ),
  'wflow_address_type_to_only_dom' => 
  array (
    'to' => '받는 사람',
  ),
  'wflow_adv_enum_type_dom' => 
  array (
    'advance' => '내려보기를 앞으로 이동',
    'retreat' => '내려보기를 뒤로 이동',
  ),
  'wflow_adv_team_type_dom' => 
  array (
    'current_team' => '접속한 사용자의 팀',
    'team_id' => '발생 기록 담당 팀',
  ),
  'wflow_adv_user_type_dom' => 
  array (
    'assigned_user_id' => '발생 기록에 지정된 사용자',
    'created_by' => '발생 기록 생성자',
    'current_user' => '접속한 사용자',
    'modified_user_id' => '발생 기록의 최종 수정자',
  ),
  'wflow_alert_type_dom' => 
  array (
    'Email' => '이메일',
    'Invite' => '초대',
  ),
  'wflow_array_type_dom' => 
  array (
    'future' => '새 가치',
    'past' => '예전 가치',
  ),
  'wflow_fire_order_dom' => 
  array (
    'actions_alerts' => '행동후 경보',
    'alerts_actions' => '경보후 행동',
  ),
  'wflow_record_type_dom' => 
  array (
    'All' => '새로 업데이트된 기록',
    'New' => '새 기록만',
    'Update' => '업데이트된 기록만',
  ),
  'wflow_rel_type_dom' => 
  array (
    'all' => '관련된 전체',
    'filter' => '필터와 관련',
  ),
  'wflow_relate_type_dom' => 
  array (
    'Manager' => '사용자의 상급자',
    'Self' => '사용자',
  ),
  'wflow_relfilter_type_dom' => 
  array (
    'all' => '관련된 전체',
    'any' => '관련된',
  ),
  'wflow_set_type_dom' => 
  array (
    'Advanced' => '고급 선택사항',
    'Basic' => '기본 선택사항',
  ),
  'wflow_source_type_dom' => 
  array (
    'Custom Template' => '고객주문 템플릿',
    'Normal Message' => '기본 메세지',
    'System Default' => '시스템 초기설정',
  ),
  'wflow_type_dom' => 
  array (
    'Normal' => '기록 저장시',
    'Time' => '시간 경과후',
  ),
  'wflow_user_type_dom' => 
  array (
    'current_user' => '현 사용자',
    'rel_user' => '연관 사용자',
    'rel_user_custom' => '연관 고객 사용자',
    'specific_role' => '특정 역할',
    'specific_team' => '특정 팀',
    'specific_user' => '특정 사용자',
  ),
);

$app_strings = array (
  'ERROR_FULLY_EXPIRED' => '귀사의 SugarCRM사용 권한 만료가 30일이 초과하였습니다.. 라이센스 사용기간을 갱신해 주십시요. 현재 관리자만 접속가능합니다.',
  'ERROR_LICENSE_EXPIRED' => '귀사의 SugarCRM 사용 권한 갱신이 필요합니다. 현재 관리자만 접속가능합니다.',
  'ERROR_NO_RECORD' => '자료 복구중 오류가 발생하였습니다. 이 자료는 지워졌거나 읽기권한이 변경된 상태일 수 있습니다.',
  'ERR_CREATING_FIELDS' => '추가 세부필드에 오류가 기재되었습니다.',
  'ERR_CREATING_TABLE' => '테이블 생성 오류:',
  'ERR_DELETE_RECORD' => '연락처를 삭제하기 위해선 정확한 문서번호를 입력하셔야합니다.',
  'ERR_EXPORT_DISABLED' => '전송 불가',
  'ERR_EXPORT_TYPE' => '전송 불가',
  'ERR_INVALID_AMOUNT' => '올바른 금액을 입력해주십시요.',
  'ERR_INVALID_DATE' => '유효한 날짜를 입력해 주십시요',
  'ERR_INVALID_DATE_FORMAT' => '날짜 형식은 다음과 같아야합니다:',
  'ERR_INVALID_DAY' => '유효한 날짜을 입력해 주십시요',
  'ERR_INVALID_EMAIL_ADDRESS' => '유효하지 않은 이메일 주소입니다.',
  'ERR_INVALID_HOUR' => '유효한 시간을 입력해 주십시요',
  'ERR_INVALID_MONTH' => '유효한 달을 입력해 주십시요',
  'ERR_INVALID_REQUIRED_FIELDS' => '입력하신 필수 항목이 유효하지 않습니다:',
  'ERR_INVALID_TIME' => '유효한 시간을 입력해주십시요',
  'ERR_INVALID_VALUE' => '올바르지 않은 값을 입력하셨습니다:',
  'ERR_INVALID_YEAR' => '유효한 4자리 년도를 입력해주세요.',
  'ERR_MISSING_REQUIRED_FIELDS' => '다음의 필수 항목을 입력하셔합니다:',
  'ERR_NEED_ACTIVE_SESSION' => '내용을 전송하기 위해서는 세션이 활성화되어야합니다.',
  'ERR_NOTHING_SELECTED' => '선택항목을 먼저 골라주세요.',
  'ERR_OPPORTUNITY_NAME_DUPE' => '입력하신 예비고객명 "%s" 이 이미 존재합니다. 아래에 다른 이름을 입력해 주십시요',
  'ERR_OPPORTUNITY_NAME_MISSING' => '예비고객명을 입력하지 않았습니다. 아래에 예비고객명을 입력해주세요.',
  'ERR_PORTAL_LOGIN_FAILED' => '포탈 로그인 생성이 불가능합니다. 관리자에 문의하십시요.',
  'ERR_RESOURCE_MANAGEMENT_INFO' => '<a href="index.php">여기</a>를 클릭하여 홈으로 돌아갑니다.',
  'ERR_SELF_REPORTING' => '사용자는 본인에게 보고할수 없습니다.',
  'ERR_SQS_NO_MATCH' => '일치하는 항목이 없습니다.',
  'ERR_SQS_NO_MATCH_FIELD' => '다음 항목이 일치하지 않습니다:',
  'LBL_ACCOUNT' => '거래처',
  'LBL_ACCOUNTS' => '거래처',
  'LBL_ACCUMULATED_HISTORY_BUTTON_KEY' => 'H',
  'LBL_ACCUMULATED_HISTORY_BUTTON_LABEL' => '요약보기',
  'LBL_ACCUMULATED_HISTORY_BUTTON_TITLE' => '요약보기',
  'LBL_ADDITIONAL_DETAILS' => '추가세부정보',
  'LBL_ADDITIONAL_DETAILS_CLOSE' => '닫기',
  'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE' => '창닫기',
  'LBL_ADD_BUTTON' => '추가',
  'LBL_ADD_BUTTON_KEY' => 'A',
  'LBL_ADD_BUTTON_TITLE' => '추가',
  'LBL_ADD_DOCUMENT' => '문서 추가하기',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_KEY' => 'L',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL' => '잠재고객으로 추가하기',
  'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE' => '잠재고객으로 추가하기',
  'LBL_ADMIN' => '관리자모드',
  'LBL_ALT_HOT_KEY' => ' ',
  'LBL_ARCHIVE' => '보관하기',
  'LBL_ASSIGNED_TO' => '담당자:',
  'LBL_ASSIGNED_TO_USER' => '담당자에 배정',
  'LBL_BACK' => '뒤로',
  'LBL_BILL_TO_ACCOUNT' => '고객에 청구',
  'LBL_BILL_TO_CONTACT' => '연락처에 청구',
  'LBL_BROWSER_TITLE' => 'SugarCRM - 기업용 오픈소스CRM',
  'LBL_BUGS' => '결함',
  'LBL_BY' => '작성자',
  'LBL_CALLS' => '전화상담',
  'LBL_CAMPAIGNS_SEND_QUEUED' => '대기중 캠페인 이메일 전송',
  'LBL_CANCEL_BUTTON_KEY' => 'X',
  'LBL_CANCEL_BUTTON_LABEL' => '취소',
  'LBL_CANCEL_BUTTON_TITLE' => '취소',
  'LBL_CASE' => '사례',
  'LBL_CASES' => '사례',
  'LBL_CHANGE_BUTTON_KEY' => 'G',
  'LBL_CHANGE_BUTTON_LABEL' => '변경하기',
  'LBL_CHANGE_BUTTON_TITLE' => '변경하기',
  'LBL_CHANGE_PASSWORD' => '비밀번호 변경하기',
  'LBL_CHARSET' => 'UTF-8',
  'LBL_CHECKALL' => '모두 선택하기',
  'LBL_CLEARALL' => '전체 선택취소',
  'LBL_CLEAR_BUTTON_KEY' => 'C',
  'LBL_CLEAR_BUTTON_LABEL' => '비우기',
  'LBL_CLEAR_BUTTON_TITLE' => '비우기',
  'LBL_CLOSEALL_BUTTON_KEY' => 'Q',
  'LBL_CLOSEALL_BUTTON_LABEL' => '전체 닫기',
  'LBL_CLOSEALL_BUTTON_TITLE' => '전체 닫기',
  'LBL_CLOSE_WINDOW' => '창닫기',
  'LBL_COMPOSE_EMAIL_BUTTON_KEY' => 'L',
  'LBL_COMPOSE_EMAIL_BUTTON_LABEL' => '이메일 작성하기',
  'LBL_COMPOSE_EMAIL_BUTTON_TITLE' => '이메일 작성하기',
  'LBL_CONTACT' => '연락처',
  'LBL_CONTACTS' => '연락처목록',
  'LBL_CONTACT_LIST' => '연락처 목록',
  'LBL_CREATED' => '생성자',
  'LBL_CREATED_BY_USER' => '사용자에 의해 생성',
  'LBL_CREATE_BUTTON_LABEL' => '새로 만들기',
  'LBL_CURRENT_USER_FILTER' => '내 자료만:',
  'LBL_DATE_ENTERED' => '생성일자:',
  'LBL_DATE_MODIFIED' => '최종 수정일자:',
  'LBL_DELETE' => '삭제',
  'LBL_DELETED' => '삭제 완료',
  'LBL_DELETE_BUTTON' => '삭제하기',
  'LBL_DELETE_BUTTON_KEY' => 'D',
  'LBL_DELETE_BUTTON_LABEL' => '삭제',
  'LBL_DELETE_BUTTON_TITLE' => '삭제',
  'LBL_DIRECT_REPORTS' => '직속 보고서',
  'LBL_DISPLAY_COLUMNS' => '열 표시하기',
  'LBL_DONE_BUTTON_KEY' => 'X',
  'LBL_DONE_BUTTON_LABEL' => '완료',
  'LBL_DONE_BUTTON_TITLE' => '완료',
  'LBL_DST_NEEDS_FIXIN' => '현재 시스템에 일광절약시간을 적용하셔야 합니다. 관리자칸의 다음 <a href="index.php?module=Administration&action=DstFix">링크</a>를 클릭하여 일광절약시간을 적용해주십시요',
  'LBL_DUPLICATE_BUTTON' => '복제하기',
  'LBL_DUPLICATE_BUTTON_KEY' => 'U',
  'LBL_DUPLICATE_BUTTON_LABEL' => '복제하기',
  'LBL_DUPLICATE_BUTTON_TITLE' => '복제하기',
  'LBL_DUP_MERGE' => '복제자료 찾기',
  'LBL_EDIT_BUTTON' => '수정하기',
  'LBL_EDIT_BUTTON_KEY' => 'E',
  'LBL_EDIT_BUTTON_LABEL' => '수정하기',
  'LBL_EDIT_BUTTON_TITLE' => '수정하기',
  'LBL_EMAILS' => '이메일',
  'LBL_EMAIL_PDF_BUTTON_KEY' => 'M',
  'LBL_EMAIL_PDF_BUTTON_LABEL' => 'PDF버전으로 이메일 보내기',
  'LBL_EMAIL_PDF_BUTTON_TITLE' => 'PDF버전으로 이메일 보내기',
  'LBL_EMPLOYEES' => '직원목록:',
  'LBL_ENTER_DATE' => '날짜 입력',
  'LBL_EXPORT' => '자료 보내기',
  'LBL_EXPORT_ALL' => '전체자료 보내기',
  'LBL_FULL_FORM_BUTTON_KEY' => 'F',
  'LBL_FULL_FORM_BUTTON_LABEL' => '전체화면으로 작성하기',
  'LBL_FULL_FORM_BUTTON_TITLE' => '전체화면으로 작성하기',
  'LBL_HIDE' => '숨기기',
  'LBL_HIDE_COLUMNS' => '열 숨기기',
  'LBL_ID' => 'ID:',
  'LBL_IMPORT' => '자료 가져오기',
  'LBL_IMPORT_PROSPECTS' => '잠재고객명단 가져오기',
  'LBL_LAST_VIEWED' => '최근에 본 항목',
  'LBL_LEADS' => '주 예비고객',
  'LBL_LISTVIEW_MASS_UPDATE_CONFIRM' => '전체 자료를 업데이트 하시겠습니까?',
  'LBL_LISTVIEW_NO_SELECTED' => '한개이상의 자료를 선택해주세요.',
  'LBL_LISTVIEW_OPTION_CURRENT' => '현재 페이지',
  'LBL_LISTVIEW_OPTION_ENTIRE' => '전체 목록',
  'LBL_LISTVIEW_OPTION_SELECTED' => '선택된 자료',
  'LBL_LISTVIEW_SELECTED_OBJECTS' => '선택 완료',
  'LBL_LIST_ACCOUNT_NAME' => '고객명',
  'LBL_LIST_ASSIGNED_USER' => '사용자',
  'LBL_LIST_CONTACT_NAME' => '연락처명:',
  'LBL_LIST_CONTACT_ROLE' => '연락처 역할',
  'LBL_LIST_EMAIL' => '이메일',
  'LBL_LIST_NAME' => '성명',
  'LBL_LIST_OF' => '전체',
  'LBL_LIST_PHONE' => '전화번호:',
  'LBL_LIST_TEAM' => '팀',
  'LBL_LIST_USER_NAME' => '사용자명',
  'LBL_LOADING' => '로딩중입니다.',
  'LBL_LOCALE_NAME_EXAMPLE_FIRST' => '길동',
  'LBL_LOCALE_NAME_EXAMPLE_LAST' => '홍',
  'LBL_LOCALE_NAME_EXAMPLE_SALUTATION' => 'Mr.',
  'LBL_LOGIN_SESSION_EXCEEDED' => '서버 접속량이 많습니다. 나중에 다시 시도해 주십시요.',
  'LBL_LOGIN_TO_ACCESS' => '이 페이지를 열기 위해서는 로그인이 필요합니다.',
  'LBL_LOGOUT' => '로그아웃',
  'LBL_MAILMERGE' => '우편 통합',
  'LBL_MAILMERGE_KEY' => 'M',
  'LBL_MASS_UPDATE' => '전체 업데이트',
  'LBL_MEETINGS' => '회의',
  'LBL_MEMBERS' => '구성원들',
  'LBL_MODIFIED' => '수정자:',
  'LBL_MODIFIED_BY_USER' => '사용자에 의해 수정',
  'LBL_MY_ACCOUNT' => '내 고객',
  'LBL_NAME' => '고객명',
  'LBL_NEW_BUTTON_KEY' => 'N',
  'LBL_NEW_BUTTON_LABEL' => '새로 만들기',
  'LBL_NEW_BUTTON_TITLE' => '새로 만들기',
  'LBL_NEXT_BUTTON_LABEL' => '다음',
  'LBL_NONE' => '--없음--',
  'LBL_NOTES' => '노트',
  'LBL_NO_RECORDS_FOUND' => '- 발견된 자료가 없습니다 -',
  'LBL_OPENALL_BUTTON_KEY' => 'O',
  'LBL_OPENALL_BUTTON_LABEL' => '모두열기',
  'LBL_OPENALL_BUTTON_TITLE' => '모두열기',
  'LBL_OPENTO_BUTTON_KEY' => 'T',
  'LBL_OPENTO_BUTTON_LABEL' => '열기',
  'LBL_OPENTO_BUTTON_TITLE' => '열기',
  'LBL_OPPORTUNITIES' => '예비고객',
  'LBL_OPPORTUNITY' => '예비고객',
  'LBL_OPPORTUNITY_NAME' => '예비고객명',
  'LBL_OR' => '또는',
  'LBL_PERCENTAGE_SYMBOL' => '%',
  'LBL_PRODUCTS' => '상품',
  'LBL_PRODUCT_BUNDLES' => '상품 묶음',
  'LBL_PROJECTS' => '프로젝트',
  'LBL_PROJECT_TASKS' => '프로젝트 과제',
  'LBL_QUOTES' => '견적서',
  'LBL_QUOTES_SHIP_TO' => '견적서 (배송지주소)',
  'LBL_QUOTE_TO_OPPORTUNITY_KEY' => 'O',
  'LBL_QUOTE_TO_OPPORTUNITY_LABEL' => '견적서에서 새 예비고객기회 만들기',
  'LBL_QUOTE_TO_OPPORTUNITY_TITLE' => '견적서에서 새 예비고객기회 만들기',
  'LBL_RELATED_RECORDS' => '연관된 자료목록',
  'LBL_REMOVE' => '제거',
  'LBL_REQUIRED_SYMBOL' => '*',
  'LBL_SAVED' => '저장되었습니다.',
  'LBL_SAVED_LAYOUT' => '레이아웃이 저장되었습니다.',
  'LBL_SAVED_VIEWS' => '저장된 화면',
  'LBL_SAVE_BUTTON_KEY' => 'S',
  'LBL_SAVE_BUTTON_LABEL' => '저장하기',
  'LBL_SAVE_BUTTON_TITLE' => '저장하기',
  'LBL_SAVE_NEW_BUTTON_KEY' => 'V',
  'LBL_SAVE_NEW_BUTTON_LABEL' => '저장 후 새 자료입력',
  'LBL_SAVE_NEW_BUTTON_TITLE' => '저장 후 새 자료입력',
  'LBL_SAVING' => '저장중 입니다.',
  'LBL_SAVING_LAYOUT' => '레이아웃 저장중입니다.',
  'LBL_SEARCH' => '검색',
  'LBL_SEARCH_BUTTON_KEY' => 'Q',
  'LBL_SEARCH_BUTTON_LABEL' => '검색',
  'LBL_SEARCH_BUTTON_TITLE' => '검색',
  'LBL_SEARCH_CRITERIA' => '검색 범주',
  'LBL_SELECT_BUTTON_KEY' => 'T',
  'LBL_SELECT_BUTTON_LABEL' => '선택하기',
  'LBL_SELECT_BUTTON_TITLE' => '선택하기',
  'LBL_SELECT_CONTACT_BUTTON_KEY' => 'T',
  'LBL_SELECT_CONTACT_BUTTON_LABEL' => '연락처 선택하기',
  'LBL_SELECT_CONTACT_BUTTON_TITLE' => '연락처 선택하기',
  'LBL_SELECT_REPORTS_BUTTON_LABEL' => '보고서에서 선택하기',
  'LBL_SELECT_REPORTS_BUTTON_TITLE' => '보고서에서 선택하기',
  'LBL_SELECT_USER_BUTTON_KEY' => 'U',
  'LBL_SELECT_USER_BUTTON_LABEL' => '사용자 선택하기',
  'LBL_SELECT_USER_BUTTON_TITLE' => '사용자 선택하기',
  'LBL_SERVER_RESPONSE_RESOURCES' => '이 페이지를 생성에사용된 자원들(queries, files)',
  'LBL_SERVER_RESPONSE_TIME' => '서버 응답 시간:',
  'LBL_SERVER_RESPONSE_TIME_SECONDS' => '초.',
  'LBL_SHIP_TO_ACCOUNT' => '거래처로 배송',
  'LBL_SHIP_TO_CONTACT' => '연락처로 배송',
  'LBL_SHORTCUTS' => '단축키',
  'LBL_SHOW' => '보기',
  'LBL_SQS_INDICATOR' => '',
  'LBL_STATUS' => '상태:',
  'LBL_STATUS_UPDATED' => '이 이벤트의 상태가 업데이트 되었습니다.',
  'LBL_SUBJECT' => '제목',
  'LBL_SYNC' => '일치화',
  'LBL_TASKS' => '업무내역',
  'LBL_TEAM' => '팀:',
  'LBL_TEAMS_LINK' => '팀',
  'LBL_TEAM_ID' => '팀 ID:',
  'LBL_THOUSANDS_SYMBOL' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_KEY' => 'K',
  'LBL_TRACK_EMAIL_BUTTON_LABEL' => '이메일 보관하기',
  'LBL_TRACK_EMAIL_BUTTON_TITLE' => '이메일 보관하기',
  'LBL_UNAUTH_ADMIN' => '관리자모드 접속 승인이 필요합니다.',
  'LBL_UNDELETE' => '삭제 취소',
  'LBL_UNDELETE_BUTTON' => '삭제 취소',
  'LBL_UNDELETE_BUTTON_LABEL' => '삭제 취소',
  'LBL_UNDELETE_BUTTON_TITLE' => '삭제 취소',
  'LBL_UNSYNC' => '일치화 취소',
  'LBL_UPDATE' => '업데이트하기',
  'LBL_USERS' => '사용자',
  'LBL_USERS_SYNC' => '사용자 일치화',
  'LBL_USER_LIST' => '사용자목록',
  'LBL_VIEW_BUTTON' => '보기',
  'LBL_VIEW_BUTTON_KEY' => 'V',
  'LBL_VIEW_BUTTON_LABEL' => '보기',
  'LBL_VIEW_BUTTON_TITLE' => '보기',
  'LBL_VIEW_PDF_BUTTON_KEY' => 'P',
  'LBL_VIEW_PDF_BUTTON_LABEL' => 'PDF로 출력하기',
  'LBL_VIEW_PDF_BUTTON_TITLE' => 'PDF로 출력하기',
  'LNK_ABOUT' => 'SugarCRM 정보',
  'LNK_ADVANCED_SEARCH' => '고급검색',
  'LNK_BASIC_SEARCH' => '기본검색',
  'LNK_DELETE' => '삭제',
  'LNK_DELETE_ALL' => '전체삭제',
  'LNK_EDIT' => '수정',
  'LNK_GET_LATEST' => '최신자료',
  'LNK_GET_LATEST_TOOLTIP' => '최신자료로 변경하기',
  'LNK_HELP' => '도움말',
  'LNK_LIST_END' => '마지막',
  'LNK_LIST_NEXT' => '다음',
  'LNK_LIST_PREVIOUS' => '이전',
  'LNK_LIST_RETURN' => '목록으로 돌아가기',
  'LNK_LIST_START' => '시작',
  'LNK_LOAD_SIGNED' => '서명',
  'LNK_LOAD_SIGNED_TOOLTIP' => '서명된 문서로 변경하기',
  'LNK_PRINT' => '인쇄하기',
  'LNK_REMOVE' => '제거',
  'LNK_RESUME' => '계속하기',
  'LNK_VIEW_CHANGE_LOG' => '변경 일지 보기',
  'LOGIN_LOGO_ERROR' => 'SugarCRM 로고를 대체하십시요',
  'NTC_CLICK_BACK' => '이전 화면으로 이동해 오류를 수정하십시요',
  'NTC_DATE_FORMAT' => '(yyyy-mm-dd)',
  'NTC_DATE_TIME_FORMAT' => '(yyyy-mm-dd 24:00)',
  'NTC_DELETE_CONFIRMATION' => '선택하신 자료를 지우시겠습니까?',
  'NTC_DELETE_CONFIRMATION_MULTIPLE' => '선택하신 기록을 지우시겠습니까?',
  'NTC_LOGIN_MESSAGE' => '사용자 아이디와 비밀번호를 입력해주세요.',
  'NTC_NO_ITEMS_DISPLAY' => '없음',
  'NTC_REMOVE_CONFIRMATION' => '이 자료 관계를 제거하시겠습니까?',
  'NTC_REQUIRED' => '필수항목입니다.',
  'NTC_SUPPORT_SUGARCRM' => 'PayPal을 통해 SugarCRM 열린 출처 프로젝트를 지원해주십시요 - 빠르고 간편하며 안전합니다.',
  'NTC_TIME_FORMAT' => '(24:00)',
  'NTC_WELCOME' => '환영합니다',
  'NTC_YEAR_FORMAT' => '(yyyy)',
);
