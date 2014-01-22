


<!DOCTYPE html>
<html>
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# githubog: http://ogp.me/ns/fb/githubog#">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>digisquare/app/Config/core.php at master · digisquare/digisquare</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub" />
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-144.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144.png" />
    <link rel="logo" type="image/svg" href="https://github-media-downloads.s3.amazonaws.com/github-logo.svg" />
    <meta property="og:image" content="https://github.global.ssl.fastly.net/images/modules/logos_page/Octocat.png">
    <meta name="hostname" content="github-fe126-cp1-prd.iad.github.net">
    <meta name="ruby" content="ruby 2.1.0p0-github-tcmalloc (60139581e1) [x86_64-linux]">
    <link rel="assets" href="https://github.global.ssl.fastly.net/">
    <link rel="conduit-xhr" href="https://ghconduit.com:25035/">
    <link rel="xhr-socket" href="/_sockets" />
    


    <meta name="msapplication-TileImage" content="/windows-tile.png" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="selected-link" value="repo_source" data-pjax-transient />
    <meta content="collector.githubapp.com" name="octolytics-host" /><meta content="collector-cdn.github.com" name="octolytics-script-host" /><meta content="github" name="octolytics-app-id" /><meta content="2EDA2324:60F4:17EB6BA:52DFCAE3" name="octolytics-dimension-request_id" /><meta content="6409282" name="octolytics-actor-id" /><meta content="KGiret" name="octolytics-actor-login" /><meta content="1dcfea8b161814d6389a9547e8474bf18c34bd9b0612d44b346b235034abdd07" name="octolytics-actor-hash" />
    

    
    
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />

    <meta content="authenticity_token" name="csrf-param" />
<meta content="IySp7eqlAysA0a48ooSpAz2ahO5LzTGgAibMyqtkrvU=" name="csrf-token" />

    <link href="https://github.global.ssl.fastly.net/assets/github-bfe8e50504e2b6288cf46ee8b20f2d2fd4bb67c0.css" media="all" rel="stylesheet" type="text/css" />
    <link href="https://github.global.ssl.fastly.net/assets/github2-f43786fbd987eb0f6210a3304a285a9befcb75ea.css" media="all" rel="stylesheet" type="text/css" />
    


      <script src="https://github.global.ssl.fastly.net/assets/frameworks-bf5987648bb83690ac0a5e955f74bbaf6ba44c4a.js" type="text/javascript"></script>
      <script async="async" defer="defer" src="https://github.global.ssl.fastly.net/assets/github-2f16c5943e9a39d7bd06b03d92dec0cf8fe04930.js" type="text/javascript"></script>
      
      <meta http-equiv="x-pjax-version" content="ca74533965c2c626a696d629bab997d0">

        <link data-pjax-transient rel='permalink' href='/digisquare/digisquare/blob/505bfa767556e4a58e143b7623cab6b399e5f607/app/Config/core.php'>
  <meta property="og:title" content="digisquare"/>
  <meta property="og:type" content="githubog:gitrepository"/>
  <meta property="og:url" content="https://github.com/digisquare/digisquare"/>
  <meta property="og:image" content="https://github.global.ssl.fastly.net/images/gravatars/gravatar-user-420.png"/>
  <meta property="og:site_name" content="GitHub"/>
  <meta property="og:description" content="digisquare - Réunir en un seul endroit tous les évènements numériques d’une région ou d’une ville."/>

  <meta name="description" content="digisquare - Réunir en un seul endroit tous les évènements numériques d’une région ou d’une ville." />

  <meta content="6362710" name="octolytics-dimension-user_id" /><meta content="digisquare" name="octolytics-dimension-user_login" /><meta content="15777487" name="octolytics-dimension-repository_id" /><meta content="digisquare/digisquare" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="false" name="octolytics-dimension-repository_is_fork" /><meta content="15777487" name="octolytics-dimension-repository_network_root_id" /><meta content="digisquare/digisquare" name="octolytics-dimension-repository_network_root_nwo" />
  <link href="https://github.com/digisquare/digisquare/commits/master.atom" rel="alternate" title="Recent Commits to digisquare:master" type="application/atom+xml" />

  </head>


  <body class="logged_in  env-production windows vis-public page-blob">
    <div class="wrapper">
      
      
      
      


      <div class="header header-logged-in true">
  <div class="container clearfix">

    <a class="header-logo-invertocat" href="https://github.com/">
  <span class="mega-octicon octicon-mark-github"></span>
</a>

    
    <a href="/notifications" class="notification-indicator tooltipped downwards" data-gotokey="n" title="You have no unread notifications">
        <span class="mail-status all-read"></span>
</a>

      <div class="command-bar js-command-bar  in-repository">
          <form accept-charset="UTF-8" action="/search" class="command-bar-form" id="top_search_form" method="get">

<input type="text" data-hotkey="/ s" name="q" id="js-command-bar-field" placeholder="Search or type a command" tabindex="1" autocapitalize="off"
    
    data-username="KGiret"
      data-repo="digisquare/digisquare"
      data-branch="master"
      data-sha="91e7bef334ee20abfea16314927b5fd0c9331f50"
  >

    <input type="hidden" name="nwo" value="digisquare/digisquare" />

    <div class="select-menu js-menu-container js-select-menu search-context-select-menu">
      <span class="minibutton select-menu-button js-menu-target">
        <span class="js-select-button">This repository</span>
      </span>

      <div class="select-menu-modal-holder js-menu-content js-navigation-container">
        <div class="select-menu-modal">

          <div class="select-menu-item js-navigation-item js-this-repository-navigation-item selected">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" class="js-search-this-repository" name="search_target" value="repository" checked="checked" />
            <div class="select-menu-item-text js-select-button-text">This repository</div>
          </div> <!-- /.select-menu-item -->

          <div class="select-menu-item js-navigation-item js-all-repositories-navigation-item">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" name="search_target" value="global" />
            <div class="select-menu-item-text js-select-button-text">All repositories</div>
          </div> <!-- /.select-menu-item -->

        </div>
      </div>
    </div>

  <span class="octicon help tooltipped downwards" title="Show command bar help">
    <span class="octicon octicon-question"></span>
  </span>


  <input type="hidden" name="ref" value="cmdform">

</form>
        <ul class="top-nav">
          <li class="explore"><a href="/explore">Explore</a></li>
            <li><a href="https://gist.github.com">Gist</a></li>
            <li><a href="/blog">Blog</a></li>
          <li><a href="https://help.github.com">Help</a></li>
        </ul>
      </div>

    


  <ul id="user-links">
    <li>
      <a href="/KGiret" class="name">
        <img height="20" src="https://2.gravatar.com/avatar/d30c4e0a484dd53691f62b8a6ffe4430?d=https%3A%2F%2Fidenticons.github.com%2Fe465b338738be61a7ffafe710814bdad.png&amp;r=x&amp;s=140" width="20" /> KGiret
      </a>
    </li>

      <li class="new-menu dropdown-toggle js-menu-container">
        <a href="#" class="js-menu-target tooltipped downwards" title="Create new…">
          <span class="octicon octicon-plus"></span>
          <span class="dropdown-arrow"></span>
        </a>

        <div class="js-menu-content">
        </div>
      </li>

      <li>
        <a href="/settings/profile" id="account_settings"
          class="tooltipped downwards"
          aria-label="Account settings (You have no verified emails)"
          title="Account settings (You have no verified emails)">
          <span class="octicon octicon-tools"></span>
        </a>
          <span class="settings-warning">!</span>
      </li>
      <li>
        <a class="tooltipped downwards" href="/logout" data-method="post" id="logout" title="Sign out" aria-label="Sign out">
          <span class="octicon octicon-log-out"></span>
        </a>
      </li>

  </ul>

<div class="js-new-dropdown-contents hidden">
  

<ul class="dropdown-menu">
  <li>
    <a href="/new"><span class="octicon octicon-repo-create"></span> New repository</a>
  </li>
  <li>
    <a href="/organizations/new"><span class="octicon octicon-organization"></span> New organization</a>
  </li>



    <li class="section-title">
      <span title="digisquare/digisquare">This repository</span>
    </li>
      <li>
        <a href="/digisquare/digisquare/issues/new"><span class="octicon octicon-issue-opened"></span> New issue</a>
      </li>
</ul>

</div>


    
  </div>
</div>

      

      

<div class="flash-global flash-warn">
<div class="container">

    <h2>
      You don't have any verified emails.  We recommend <a href="https://github.com/settings/emails">verifying</a> at least one email.
    </h2>
    <p>
      Email verification helps our support team help you in case you have any email issues or lose your password.
    </p>














</div>
</div>



          <div class="site" itemscope itemtype="http://schema.org/WebPage">
    
    <div class="pagehead repohead instapaper_ignore readability-menu">
      <div class="container">
        

<ul class="pagehead-actions">

    <li class="subscription">
      <form accept-charset="UTF-8" action="/notifications/subscribe" class="js-social-container" data-autosubmit="true" data-remote="true" method="post"><div style="margin:0;padding:0;display:inline"><input name="authenticity_token" type="hidden" value="IySp7eqlAysA0a48ooSpAz2ahO5LzTGgAibMyqtkrvU=" /></div>  <input id="repository_id" name="repository_id" type="hidden" value="15777487" />

    <div class="select-menu js-menu-container js-select-menu">
      <a class="social-count js-social-count" href="/digisquare/digisquare/watchers">
        2
      </a>
      <span class="minibutton select-menu-button with-count js-menu-target" role="button" tabindex="0">
        <span class="js-select-button">
          <span class="octicon octicon-eye-watch"></span>
          Watch
        </span>
      </span>

      <div class="select-menu-modal-holder">
        <div class="select-menu-modal subscription-menu-modal js-menu-content">
          <div class="select-menu-header">
            <span class="select-menu-title">Notification status</span>
            <span class="octicon octicon-remove-close js-menu-close"></span>
          </div> <!-- /.select-menu-header -->

          <div class="select-menu-list js-navigation-container" role="menu">

            <div class="select-menu-item js-navigation-item selected" role="menuitem" tabindex="0">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <div class="select-menu-item-text">
                <input checked="checked" id="do_included" name="do" type="radio" value="included" />
                <h4>Not watching</h4>
                <span class="description">You only receive notifications for conversations in which you participate or are @mentioned.</span>
                <span class="js-select-button-text hidden-select-button-text">
                  <span class="octicon octicon-eye-watch"></span>
                  Watch
                </span>
              </div>
            </div> <!-- /.select-menu-item -->

            <div class="select-menu-item js-navigation-item " role="menuitem" tabindex="0">
              <span class="select-menu-item-icon octicon octicon octicon-check"></span>
              <div class="select-menu-item-text">
                <input id="do_subscribed" name="do" type="radio" value="subscribed" />
                <h4>Watching</h4>
                <span class="description">You receive notifications for all conversations in this repository.</span>
                <span class="js-select-button-text hidden-select-button-text">
                  <span class="octicon octicon-eye-unwatch"></span>
                  Unwatch
                </span>
              </div>
            </div> <!-- /.select-menu-item -->

            <div class="select-menu-item js-navigation-item " role="menuitem" tabindex="0">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <div class="select-menu-item-text">
                <input id="do_ignore" name="do" type="radio" value="ignore" />
                <h4>Ignoring</h4>
                <span class="description">You do not receive any notifications for conversations in this repository.</span>
                <span class="js-select-button-text hidden-select-button-text">
                  <span class="octicon octicon-mute"></span>
                  Stop ignoring
                </span>
              </div>
            </div> <!-- /.select-menu-item -->

          </div> <!-- /.select-menu-list -->

        </div> <!-- /.select-menu-modal -->
      </div> <!-- /.select-menu-modal-holder -->
    </div> <!-- /.select-menu -->

</form>
    </li>

  <li>
  

  <div class="js-toggler-container js-social-container starring-container ">
    <a href="/digisquare/digisquare/unstar"
      class="minibutton with-count js-toggler-target star-button starred upwards"
      title="Unstar this repository" data-remote="true" data-method="post" rel="nofollow">
      <span class="octicon octicon-star-delete"></span><span class="text">Unstar</span>
    </a>

    <a href="/digisquare/digisquare/star"
      class="minibutton with-count js-toggler-target star-button unstarred upwards"
      title="Star this repository" data-remote="true" data-method="post" rel="nofollow">
      <span class="octicon octicon-star"></span><span class="text">Star</span>
    </a>

      <a class="social-count js-social-count" href="/digisquare/digisquare/stargazers">
        3
      </a>
  </div>

  </li>


        <li>
          <a href="/digisquare/digisquare/fork" class="minibutton with-count js-toggler-target fork-button lighter upwards" title="Fork this repo" rel="nofollow" data-method="post">
            <span class="octicon octicon-git-branch-create"></span><span class="text">Fork</span>
          </a>
          <a href="/digisquare/digisquare/network" class="social-count">20</a>
        </li>


</ul>

        <h1 itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="entry-title public">
          <span class="repo-label"><span>public</span></span>
          <span class="mega-octicon octicon-repo"></span>
          <span class="author">
            <a href="/digisquare" class="url fn" itemprop="url" rel="author"><span itemprop="title">digisquare</span></a>
          </span>
          <span class="repohead-name-divider">/</span>
          <strong><a href="/digisquare/digisquare" class="js-current-repository js-repo-home-link">digisquare</a></strong>

          <span class="page-context-loader">
            <img alt="Octocat-spinner-32" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
          </span>

        </h1>
      </div><!-- /.container -->
    </div><!-- /.repohead -->

    <div class="container">
      

      <div class="repository-with-sidebar repo-container  ">

        <div class="repository-sidebar">
            

<div class="sunken-menu vertical-right repo-nav js-repo-nav js-repository-container-pjax js-octicon-loaders">
  <div class="sunken-menu-contents">
    <ul class="sunken-menu-group">
      <li class="tooltipped leftwards" title="Code">
        <a href="/digisquare/digisquare" aria-label="Code" class="selected js-selected-navigation-item sunken-menu-item" data-gotokey="c" data-pjax="true" data-selected-links="repo_source repo_downloads repo_commits repo_tags repo_branches /digisquare/digisquare">
          <span class="octicon octicon-code"></span> <span class="full-word">Code</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

        <li class="tooltipped leftwards" title="Issues">
          <a href="/digisquare/digisquare/issues" aria-label="Issues" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-gotokey="i" data-selected-links="repo_issues /digisquare/digisquare/issues">
            <span class="octicon octicon-issue-opened"></span> <span class="full-word">Issues</span>
            <span class='counter'>2</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>        </li>

      <li class="tooltipped leftwards" title="Pull Requests">
        <a href="/digisquare/digisquare/pulls" aria-label="Pull Requests" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-gotokey="p" data-selected-links="repo_pulls /digisquare/digisquare/pulls">
            <span class="octicon octicon-git-pull-request"></span> <span class="full-word">Pull Requests</span>
            <span class='counter'>2</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>


        <li class="tooltipped leftwards" title="Wiki">
          <a href="/digisquare/digisquare/wiki" aria-label="Wiki" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="repo_wiki /digisquare/digisquare/wiki">
            <span class="octicon octicon-book"></span> <span class="full-word">Wiki</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>        </li>
    </ul>
    <div class="sunken-menu-separator"></div>
    <ul class="sunken-menu-group">

      <li class="tooltipped leftwards" title="Pulse">
        <a href="/digisquare/digisquare/pulse" aria-label="Pulse" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="pulse /digisquare/digisquare/pulse">
          <span class="octicon octicon-pulse"></span> <span class="full-word">Pulse</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped leftwards" title="Graphs">
        <a href="/digisquare/digisquare/graphs" aria-label="Graphs" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="repo_graphs repo_contributors /digisquare/digisquare/graphs">
          <span class="octicon octicon-graph"></span> <span class="full-word">Graphs</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped leftwards" title="Network">
        <a href="/digisquare/digisquare/network" aria-label="Network" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-selected-links="repo_network /digisquare/digisquare/network">
          <span class="octicon octicon-git-branch"></span> <span class="full-word">Network</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>
    </ul>


  </div>
</div>

            <div class="only-with-full-nav">
              

  

<div class="clone-url open"
  data-protocol-type="http"
  data-url="/users/set_protocol?protocol_selector=http&amp;protocol_type=clone">
  <h3><strong>HTTPS</strong> clone URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/digisquare/digisquare.git" readonly="readonly">

    <span class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/digisquare/digisquare.git" data-copied-hint="copied!" title="copy to clipboard"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>

  

<div class="clone-url "
  data-protocol-type="ssh"
  data-url="/users/set_protocol?protocol_selector=ssh&amp;protocol_type=clone">
  <h3><strong>SSH</strong> clone URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="git@github.com:digisquare/digisquare.git" readonly="readonly">

    <span class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="git@github.com:digisquare/digisquare.git" data-copied-hint="copied!" title="copy to clipboard"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>

  

<div class="clone-url "
  data-protocol-type="subversion"
  data-url="/users/set_protocol?protocol_selector=subversion&amp;protocol_type=clone">
  <h3><strong>Subversion</strong> checkout URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/digisquare/digisquare" readonly="readonly">

    <span class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/digisquare/digisquare" data-copied-hint="copied!" title="copy to clipboard"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>


<p class="clone-options">You can clone with
      <a href="#" class="js-clone-selector" data-protocol="http">HTTPS</a>,
      <a href="#" class="js-clone-selector" data-protocol="ssh">SSH</a>,
      or <a href="#" class="js-clone-selector" data-protocol="subversion">Subversion</a>.
  <span class="octicon help tooltipped upwards" title="Get help on which URL is right for you.">
    <a href="https://help.github.com/articles/which-remote-url-should-i-use">
    <span class="octicon octicon-question"></span>
    </a>
  </span>
</p>


  <a href="http://windows.github.com" class="minibutton sidebar-button">
    <span class="octicon octicon-device-desktop"></span>
    Clone in Desktop
  </a>

              <a href="/digisquare/digisquare/archive/master.zip"
                 class="minibutton sidebar-button"
                 title="Download this repository as a zip file"
                 rel="nofollow">
                <span class="octicon octicon-cloud-download"></span>
                Download ZIP
              </a>
            </div>
        </div><!-- /.repository-sidebar -->

        <div id="js-repo-pjax-container" class="repository-content context-loader-container" data-pjax-container>
          


<!-- blob contrib key: blob_contributors:v21:6291c4709661f7a758510745391e8a52 -->

<p title="This is a placeholder element" class="js-history-link-replace hidden"></p>

<a href="/digisquare/digisquare/find/master" data-pjax data-hotkey="t" class="js-show-file-finder" style="display:none">Show File Finder</a>

<div class="file-navigation">
  

<div class="select-menu js-menu-container js-select-menu" >
  <span class="minibutton select-menu-button js-menu-target" data-hotkey="w"
    data-master-branch="master"
    data-ref="master"
    role="button" aria-label="Switch branches or tags" tabindex="0">
    <span class="octicon octicon-git-branch"></span>
    <i>branch:</i>
    <span class="js-select-button">master</span>
  </span>

  <div class="select-menu-modal-holder js-menu-content js-navigation-container" data-pjax>

    <div class="select-menu-modal">
      <div class="select-menu-header">
        <span class="select-menu-title">Switch branches/tags</span>
        <span class="octicon octicon-remove-close js-menu-close"></span>
      </div> <!-- /.select-menu-header -->

      <div class="select-menu-filters">
        <div class="select-menu-text-filter">
          <input type="text" aria-label="Filter branches/tags" id="context-commitish-filter-field" class="js-filterable-field js-navigation-enable" placeholder="Filter branches/tags">
        </div>
        <div class="select-menu-tabs">
          <ul>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="branches" class="js-select-menu-tab">Branches</a>
            </li>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="tags" class="js-select-menu-tab">Tags</a>
            </li>
          </ul>
        </div><!-- /.select-menu-tabs -->
      </div><!-- /.select-menu-filters -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="branches">

        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <div class="select-menu-item js-navigation-item selected">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/digisquare/digisquare/blob/master/app/Config/core.php"
                 data-name="master"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="master">master</a>
            </div> <!-- /.select-menu-item -->
        </div>

          <div class="select-menu-no-results">Nothing to show</div>
      </div> <!-- /.select-menu-list -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="tags">
        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


        </div>

        <div class="select-menu-no-results">Nothing to show</div>
      </div> <!-- /.select-menu-list -->

    </div> <!-- /.select-menu-modal -->
  </div> <!-- /.select-menu-modal-holder -->
</div> <!-- /.select-menu -->

  <div class="breadcrumb">
    <span class='repo-root js-repo-root'><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/digisquare/digisquare" data-branch="master" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">digisquare</span></a></span></span><span class="separator"> / </span><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/digisquare/digisquare/tree/master/app" data-branch="master" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">app</span></a></span><span class="separator"> / </span><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/digisquare/digisquare/tree/master/app/Config" data-branch="master" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">Config</span></a></span><span class="separator"> / </span><strong class="final-path">core.php</strong> <span class="js-zeroclipboard minibutton zeroclipboard-button" data-clipboard-text="app/Config/core.php" data-copied-hint="copied!" title="copy to clipboard"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>



  <div class="commit file-history-tease">
    <img class="main-avatar" height="24" src="https://1.gravatar.com/avatar/2fff641d18e42cdf14144e67369cd983?d=https%3A%2F%2Fidenticons.github.com%2F85207b82ce73e0221f7af28a163ff9ba.png&amp;r=x&amp;s=140" width="24" />
    <span class="author"><a href="/damusnet" rel="author">damusnet</a></span>
    <time class="js-relative-date" datetime="2014-01-22T04:14:02-08:00" title="2014-01-22 04:14:02">January 22, 2014</time>
    <div class="commit-title">
        <a href="/digisquare/digisquare/commit/c16b26078a420feae24111ee19283c066a8f6a3e" class="message" data-pjax="true" title="revert changes made to app/Config/core.php related to admin prefix routi...

...ng">revert changes made to app/Config/core.php related to admin prefix ro…</a>
    </div>

    <div class="participation">
      <p class="quickstat"><a href="#blob_contributors_box" rel="facebox"><strong>2</strong> contributors</a></p>
          <a class="avatar tooltipped downwards" title="damusnet" href="/digisquare/digisquare/commits/master/app/Config/core.php?author=damusnet"><img height="20" src="https://1.gravatar.com/avatar/2fff641d18e42cdf14144e67369cd983?d=https%3A%2F%2Fidenticons.github.com%2F85207b82ce73e0221f7af28a163ff9ba.png&amp;r=x&amp;s=140" width="20" /></a>
    <a class="avatar tooltipped downwards" title="juniors74335" href="/digisquare/digisquare/commits/master/app/Config/core.php?author=juniors74335"><img height="20" src="https://1.gravatar.com/avatar/0dcfb40033fb7b3bd9e242b8eab6fd4e?d=https%3A%2F%2Fidenticons.github.com%2F020db751a3d933191d327079c16c83cf.png&amp;r=x&amp;s=140" width="20" /></a>


    </div>
    <div id="blob_contributors_box" style="display:none">
      <h2 class="facebox-header">Users who have contributed to this file</h2>
      <ul class="facebox-user-list">
          <li class="facebox-user-list-item">
            <img height="24" src="https://1.gravatar.com/avatar/2fff641d18e42cdf14144e67369cd983?d=https%3A%2F%2Fidenticons.github.com%2F85207b82ce73e0221f7af28a163ff9ba.png&amp;r=x&amp;s=140" width="24" />
            <a href="/damusnet">damusnet</a>
          </li>
          <li class="facebox-user-list-item">
            <img height="24" src="https://1.gravatar.com/avatar/0dcfb40033fb7b3bd9e242b8eab6fd4e?d=https%3A%2F%2Fidenticons.github.com%2F020db751a3d933191d327079c16c83cf.png&amp;r=x&amp;s=140" width="24" />
            <a href="/juniors74335">juniors74335</a>
          </li>
      </ul>
    </div>
  </div>

<div id="files" class="bubble">
  <div class="file">
    <div class="meta">
      <div class="info">
        <span class="icon"><b class="octicon octicon-file-text"></b></span>
        <span class="mode" title="File Mode">executable file</span>
          <span>367 lines (339 sloc)</span>
        <span>13.479 kb</span>
      </div>
      <div class="actions">
        <div class="button-group">
            <a class="minibutton tooltipped leftwards"
               href="http://windows.github.com" title="Open this file in GitHub for Windows">
                <span class="octicon octicon-device-desktop"></span> Open
            </a>
                <a class="minibutton tooltipped upwards"
                   title="Clicking this button will automatically fork this project so you can edit the file"
                   href="/digisquare/digisquare/edit/master/app/Config/core.php"
                   data-method="post" rel="nofollow">Edit</a>
          <a href="/digisquare/digisquare/raw/master/app/Config/core.php" class="button minibutton " id="raw-url">Raw</a>
            <a href="/digisquare/digisquare/blame/master/app/Config/core.php" class="button minibutton ">Blame</a>
          <a href="/digisquare/digisquare/commits/master/app/Config/core.php" class="button minibutton " rel="nofollow">History</a>
        </div><!-- /.button-group -->
          <a class="minibutton danger empty-icon tooltipped downwards"
             href="/digisquare/digisquare/delete/master/app/Config/core.php"
             title="Fork this project and delete file"
             data-method="post" data-test-id="delete-blob-file" rel="nofollow">
          Delete
        </a>
      </div><!-- /.actions -->

    </div>
        <div class="blob-wrapper data type-php js-blob-data">
        <table class="file-code file-diff">
          <tr class="file-code-line">
            <td class="blob-line-nums">
              <span id="L1" rel="#L1">1</span>
<span id="L2" rel="#L2">2</span>
<span id="L3" rel="#L3">3</span>
<span id="L4" rel="#L4">4</span>
<span id="L5" rel="#L5">5</span>
<span id="L6" rel="#L6">6</span>
<span id="L7" rel="#L7">7</span>
<span id="L8" rel="#L8">8</span>
<span id="L9" rel="#L9">9</span>
<span id="L10" rel="#L10">10</span>
<span id="L11" rel="#L11">11</span>
<span id="L12" rel="#L12">12</span>
<span id="L13" rel="#L13">13</span>
<span id="L14" rel="#L14">14</span>
<span id="L15" rel="#L15">15</span>
<span id="L16" rel="#L16">16</span>
<span id="L17" rel="#L17">17</span>
<span id="L18" rel="#L18">18</span>
<span id="L19" rel="#L19">19</span>
<span id="L20" rel="#L20">20</span>
<span id="L21" rel="#L21">21</span>
<span id="L22" rel="#L22">22</span>
<span id="L23" rel="#L23">23</span>
<span id="L24" rel="#L24">24</span>
<span id="L25" rel="#L25">25</span>
<span id="L26" rel="#L26">26</span>
<span id="L27" rel="#L27">27</span>
<span id="L28" rel="#L28">28</span>
<span id="L29" rel="#L29">29</span>
<span id="L30" rel="#L30">30</span>
<span id="L31" rel="#L31">31</span>
<span id="L32" rel="#L32">32</span>
<span id="L33" rel="#L33">33</span>
<span id="L34" rel="#L34">34</span>
<span id="L35" rel="#L35">35</span>
<span id="L36" rel="#L36">36</span>
<span id="L37" rel="#L37">37</span>
<span id="L38" rel="#L38">38</span>
<span id="L39" rel="#L39">39</span>
<span id="L40" rel="#L40">40</span>
<span id="L41" rel="#L41">41</span>
<span id="L42" rel="#L42">42</span>
<span id="L43" rel="#L43">43</span>
<span id="L44" rel="#L44">44</span>
<span id="L45" rel="#L45">45</span>
<span id="L46" rel="#L46">46</span>
<span id="L47" rel="#L47">47</span>
<span id="L48" rel="#L48">48</span>
<span id="L49" rel="#L49">49</span>
<span id="L50" rel="#L50">50</span>
<span id="L51" rel="#L51">51</span>
<span id="L52" rel="#L52">52</span>
<span id="L53" rel="#L53">53</span>
<span id="L54" rel="#L54">54</span>
<span id="L55" rel="#L55">55</span>
<span id="L56" rel="#L56">56</span>
<span id="L57" rel="#L57">57</span>
<span id="L58" rel="#L58">58</span>
<span id="L59" rel="#L59">59</span>
<span id="L60" rel="#L60">60</span>
<span id="L61" rel="#L61">61</span>
<span id="L62" rel="#L62">62</span>
<span id="L63" rel="#L63">63</span>
<span id="L64" rel="#L64">64</span>
<span id="L65" rel="#L65">65</span>
<span id="L66" rel="#L66">66</span>
<span id="L67" rel="#L67">67</span>
<span id="L68" rel="#L68">68</span>
<span id="L69" rel="#L69">69</span>
<span id="L70" rel="#L70">70</span>
<span id="L71" rel="#L71">71</span>
<span id="L72" rel="#L72">72</span>
<span id="L73" rel="#L73">73</span>
<span id="L74" rel="#L74">74</span>
<span id="L75" rel="#L75">75</span>
<span id="L76" rel="#L76">76</span>
<span id="L77" rel="#L77">77</span>
<span id="L78" rel="#L78">78</span>
<span id="L79" rel="#L79">79</span>
<span id="L80" rel="#L80">80</span>
<span id="L81" rel="#L81">81</span>
<span id="L82" rel="#L82">82</span>
<span id="L83" rel="#L83">83</span>
<span id="L84" rel="#L84">84</span>
<span id="L85" rel="#L85">85</span>
<span id="L86" rel="#L86">86</span>
<span id="L87" rel="#L87">87</span>
<span id="L88" rel="#L88">88</span>
<span id="L89" rel="#L89">89</span>
<span id="L90" rel="#L90">90</span>
<span id="L91" rel="#L91">91</span>
<span id="L92" rel="#L92">92</span>
<span id="L93" rel="#L93">93</span>
<span id="L94" rel="#L94">94</span>
<span id="L95" rel="#L95">95</span>
<span id="L96" rel="#L96">96</span>
<span id="L97" rel="#L97">97</span>
<span id="L98" rel="#L98">98</span>
<span id="L99" rel="#L99">99</span>
<span id="L100" rel="#L100">100</span>
<span id="L101" rel="#L101">101</span>
<span id="L102" rel="#L102">102</span>
<span id="L103" rel="#L103">103</span>
<span id="L104" rel="#L104">104</span>
<span id="L105" rel="#L105">105</span>
<span id="L106" rel="#L106">106</span>
<span id="L107" rel="#L107">107</span>
<span id="L108" rel="#L108">108</span>
<span id="L109" rel="#L109">109</span>
<span id="L110" rel="#L110">110</span>
<span id="L111" rel="#L111">111</span>
<span id="L112" rel="#L112">112</span>
<span id="L113" rel="#L113">113</span>
<span id="L114" rel="#L114">114</span>
<span id="L115" rel="#L115">115</span>
<span id="L116" rel="#L116">116</span>
<span id="L117" rel="#L117">117</span>
<span id="L118" rel="#L118">118</span>
<span id="L119" rel="#L119">119</span>
<span id="L120" rel="#L120">120</span>
<span id="L121" rel="#L121">121</span>
<span id="L122" rel="#L122">122</span>
<span id="L123" rel="#L123">123</span>
<span id="L124" rel="#L124">124</span>
<span id="L125" rel="#L125">125</span>
<span id="L126" rel="#L126">126</span>
<span id="L127" rel="#L127">127</span>
<span id="L128" rel="#L128">128</span>
<span id="L129" rel="#L129">129</span>
<span id="L130" rel="#L130">130</span>
<span id="L131" rel="#L131">131</span>
<span id="L132" rel="#L132">132</span>
<span id="L133" rel="#L133">133</span>
<span id="L134" rel="#L134">134</span>
<span id="L135" rel="#L135">135</span>
<span id="L136" rel="#L136">136</span>
<span id="L137" rel="#L137">137</span>
<span id="L138" rel="#L138">138</span>
<span id="L139" rel="#L139">139</span>
<span id="L140" rel="#L140">140</span>
<span id="L141" rel="#L141">141</span>
<span id="L142" rel="#L142">142</span>
<span id="L143" rel="#L143">143</span>
<span id="L144" rel="#L144">144</span>
<span id="L145" rel="#L145">145</span>
<span id="L146" rel="#L146">146</span>
<span id="L147" rel="#L147">147</span>
<span id="L148" rel="#L148">148</span>
<span id="L149" rel="#L149">149</span>
<span id="L150" rel="#L150">150</span>
<span id="L151" rel="#L151">151</span>
<span id="L152" rel="#L152">152</span>
<span id="L153" rel="#L153">153</span>
<span id="L154" rel="#L154">154</span>
<span id="L155" rel="#L155">155</span>
<span id="L156" rel="#L156">156</span>
<span id="L157" rel="#L157">157</span>
<span id="L158" rel="#L158">158</span>
<span id="L159" rel="#L159">159</span>
<span id="L160" rel="#L160">160</span>
<span id="L161" rel="#L161">161</span>
<span id="L162" rel="#L162">162</span>
<span id="L163" rel="#L163">163</span>
<span id="L164" rel="#L164">164</span>
<span id="L165" rel="#L165">165</span>
<span id="L166" rel="#L166">166</span>
<span id="L167" rel="#L167">167</span>
<span id="L168" rel="#L168">168</span>
<span id="L169" rel="#L169">169</span>
<span id="L170" rel="#L170">170</span>
<span id="L171" rel="#L171">171</span>
<span id="L172" rel="#L172">172</span>
<span id="L173" rel="#L173">173</span>
<span id="L174" rel="#L174">174</span>
<span id="L175" rel="#L175">175</span>
<span id="L176" rel="#L176">176</span>
<span id="L177" rel="#L177">177</span>
<span id="L178" rel="#L178">178</span>
<span id="L179" rel="#L179">179</span>
<span id="L180" rel="#L180">180</span>
<span id="L181" rel="#L181">181</span>
<span id="L182" rel="#L182">182</span>
<span id="L183" rel="#L183">183</span>
<span id="L184" rel="#L184">184</span>
<span id="L185" rel="#L185">185</span>
<span id="L186" rel="#L186">186</span>
<span id="L187" rel="#L187">187</span>
<span id="L188" rel="#L188">188</span>
<span id="L189" rel="#L189">189</span>
<span id="L190" rel="#L190">190</span>
<span id="L191" rel="#L191">191</span>
<span id="L192" rel="#L192">192</span>
<span id="L193" rel="#L193">193</span>
<span id="L194" rel="#L194">194</span>
<span id="L195" rel="#L195">195</span>
<span id="L196" rel="#L196">196</span>
<span id="L197" rel="#L197">197</span>
<span id="L198" rel="#L198">198</span>
<span id="L199" rel="#L199">199</span>
<span id="L200" rel="#L200">200</span>
<span id="L201" rel="#L201">201</span>
<span id="L202" rel="#L202">202</span>
<span id="L203" rel="#L203">203</span>
<span id="L204" rel="#L204">204</span>
<span id="L205" rel="#L205">205</span>
<span id="L206" rel="#L206">206</span>
<span id="L207" rel="#L207">207</span>
<span id="L208" rel="#L208">208</span>
<span id="L209" rel="#L209">209</span>
<span id="L210" rel="#L210">210</span>
<span id="L211" rel="#L211">211</span>
<span id="L212" rel="#L212">212</span>
<span id="L213" rel="#L213">213</span>
<span id="L214" rel="#L214">214</span>
<span id="L215" rel="#L215">215</span>
<span id="L216" rel="#L216">216</span>
<span id="L217" rel="#L217">217</span>
<span id="L218" rel="#L218">218</span>
<span id="L219" rel="#L219">219</span>
<span id="L220" rel="#L220">220</span>
<span id="L221" rel="#L221">221</span>
<span id="L222" rel="#L222">222</span>
<span id="L223" rel="#L223">223</span>
<span id="L224" rel="#L224">224</span>
<span id="L225" rel="#L225">225</span>
<span id="L226" rel="#L226">226</span>
<span id="L227" rel="#L227">227</span>
<span id="L228" rel="#L228">228</span>
<span id="L229" rel="#L229">229</span>
<span id="L230" rel="#L230">230</span>
<span id="L231" rel="#L231">231</span>
<span id="L232" rel="#L232">232</span>
<span id="L233" rel="#L233">233</span>
<span id="L234" rel="#L234">234</span>
<span id="L235" rel="#L235">235</span>
<span id="L236" rel="#L236">236</span>
<span id="L237" rel="#L237">237</span>
<span id="L238" rel="#L238">238</span>
<span id="L239" rel="#L239">239</span>
<span id="L240" rel="#L240">240</span>
<span id="L241" rel="#L241">241</span>
<span id="L242" rel="#L242">242</span>
<span id="L243" rel="#L243">243</span>
<span id="L244" rel="#L244">244</span>
<span id="L245" rel="#L245">245</span>
<span id="L246" rel="#L246">246</span>
<span id="L247" rel="#L247">247</span>
<span id="L248" rel="#L248">248</span>
<span id="L249" rel="#L249">249</span>
<span id="L250" rel="#L250">250</span>
<span id="L251" rel="#L251">251</span>
<span id="L252" rel="#L252">252</span>
<span id="L253" rel="#L253">253</span>
<span id="L254" rel="#L254">254</span>
<span id="L255" rel="#L255">255</span>
<span id="L256" rel="#L256">256</span>
<span id="L257" rel="#L257">257</span>
<span id="L258" rel="#L258">258</span>
<span id="L259" rel="#L259">259</span>
<span id="L260" rel="#L260">260</span>
<span id="L261" rel="#L261">261</span>
<span id="L262" rel="#L262">262</span>
<span id="L263" rel="#L263">263</span>
<span id="L264" rel="#L264">264</span>
<span id="L265" rel="#L265">265</span>
<span id="L266" rel="#L266">266</span>
<span id="L267" rel="#L267">267</span>
<span id="L268" rel="#L268">268</span>
<span id="L269" rel="#L269">269</span>
<span id="L270" rel="#L270">270</span>
<span id="L271" rel="#L271">271</span>
<span id="L272" rel="#L272">272</span>
<span id="L273" rel="#L273">273</span>
<span id="L274" rel="#L274">274</span>
<span id="L275" rel="#L275">275</span>
<span id="L276" rel="#L276">276</span>
<span id="L277" rel="#L277">277</span>
<span id="L278" rel="#L278">278</span>
<span id="L279" rel="#L279">279</span>
<span id="L280" rel="#L280">280</span>
<span id="L281" rel="#L281">281</span>
<span id="L282" rel="#L282">282</span>
<span id="L283" rel="#L283">283</span>
<span id="L284" rel="#L284">284</span>
<span id="L285" rel="#L285">285</span>
<span id="L286" rel="#L286">286</span>
<span id="L287" rel="#L287">287</span>
<span id="L288" rel="#L288">288</span>
<span id="L289" rel="#L289">289</span>
<span id="L290" rel="#L290">290</span>
<span id="L291" rel="#L291">291</span>
<span id="L292" rel="#L292">292</span>
<span id="L293" rel="#L293">293</span>
<span id="L294" rel="#L294">294</span>
<span id="L295" rel="#L295">295</span>
<span id="L296" rel="#L296">296</span>
<span id="L297" rel="#L297">297</span>
<span id="L298" rel="#L298">298</span>
<span id="L299" rel="#L299">299</span>
<span id="L300" rel="#L300">300</span>
<span id="L301" rel="#L301">301</span>
<span id="L302" rel="#L302">302</span>
<span id="L303" rel="#L303">303</span>
<span id="L304" rel="#L304">304</span>
<span id="L305" rel="#L305">305</span>
<span id="L306" rel="#L306">306</span>
<span id="L307" rel="#L307">307</span>
<span id="L308" rel="#L308">308</span>
<span id="L309" rel="#L309">309</span>
<span id="L310" rel="#L310">310</span>
<span id="L311" rel="#L311">311</span>
<span id="L312" rel="#L312">312</span>
<span id="L313" rel="#L313">313</span>
<span id="L314" rel="#L314">314</span>
<span id="L315" rel="#L315">315</span>
<span id="L316" rel="#L316">316</span>
<span id="L317" rel="#L317">317</span>
<span id="L318" rel="#L318">318</span>
<span id="L319" rel="#L319">319</span>
<span id="L320" rel="#L320">320</span>
<span id="L321" rel="#L321">321</span>
<span id="L322" rel="#L322">322</span>
<span id="L323" rel="#L323">323</span>
<span id="L324" rel="#L324">324</span>
<span id="L325" rel="#L325">325</span>
<span id="L326" rel="#L326">326</span>
<span id="L327" rel="#L327">327</span>
<span id="L328" rel="#L328">328</span>
<span id="L329" rel="#L329">329</span>
<span id="L330" rel="#L330">330</span>
<span id="L331" rel="#L331">331</span>
<span id="L332" rel="#L332">332</span>
<span id="L333" rel="#L333">333</span>
<span id="L334" rel="#L334">334</span>
<span id="L335" rel="#L335">335</span>
<span id="L336" rel="#L336">336</span>
<span id="L337" rel="#L337">337</span>
<span id="L338" rel="#L338">338</span>
<span id="L339" rel="#L339">339</span>
<span id="L340" rel="#L340">340</span>
<span id="L341" rel="#L341">341</span>
<span id="L342" rel="#L342">342</span>
<span id="L343" rel="#L343">343</span>
<span id="L344" rel="#L344">344</span>
<span id="L345" rel="#L345">345</span>
<span id="L346" rel="#L346">346</span>
<span id="L347" rel="#L347">347</span>
<span id="L348" rel="#L348">348</span>
<span id="L349" rel="#L349">349</span>
<span id="L350" rel="#L350">350</span>
<span id="L351" rel="#L351">351</span>
<span id="L352" rel="#L352">352</span>
<span id="L353" rel="#L353">353</span>
<span id="L354" rel="#L354">354</span>
<span id="L355" rel="#L355">355</span>
<span id="L356" rel="#L356">356</span>
<span id="L357" rel="#L357">357</span>
<span id="L358" rel="#L358">358</span>
<span id="L359" rel="#L359">359</span>
<span id="L360" rel="#L360">360</span>
<span id="L361" rel="#L361">361</span>
<span id="L362" rel="#L362">362</span>
<span id="L363" rel="#L363">363</span>
<span id="L364" rel="#L364">364</span>
<span id="L365" rel="#L365">365</span>
<span id="L366" rel="#L366">366</span>

            </td>
            <td class="blob-line-code">
                    <div class="code-body highlight"><pre><div class='line' id='LC1'><span class="o">&lt;?</span><span class="nx">php</span></div><div class='line' id='LC2'><span class="sd">/**</span></div><div class='line' id='LC3'><span class="sd"> * This is core configuration file.</span></div><div class='line' id='LC4'><span class="sd"> *</span></div><div class='line' id='LC5'><span class="sd"> * Use it to configure core behavior of Cake.</span></div><div class='line' id='LC6'><span class="sd"> *</span></div><div class='line' id='LC7'><span class="sd"> * @link          http://cakephp.org CakePHP(tm) Project</span></div><div class='line' id='LC8'><span class="sd"> * @package       app.Config</span></div><div class='line' id='LC9'><span class="sd"> * @since         CakePHP(tm) v 0.2.9</span></div><div class='line' id='LC10'><span class="sd"> */</span></div><div class='line' id='LC11'><br/></div><div class='line' id='LC12'><span class="sd">/**</span></div><div class='line' id='LC13'><span class="sd"> * CakePHP Debug Level:</span></div><div class='line' id='LC14'><span class="sd"> *</span></div><div class='line' id='LC15'><span class="sd"> * Production Mode:</span></div><div class='line' id='LC16'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0: No error messages, errors, or warnings shown. Flash messages redirect.</span></div><div class='line' id='LC17'><span class="sd"> *</span></div><div class='line' id='LC18'><span class="sd"> * Development Mode:</span></div><div class='line' id='LC19'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1: Errors and warnings shown, model caches refreshed, flash messages halted.</span></div><div class='line' id='LC20'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2: As in 1, but also with full debug messages and SQL output.</span></div><div class='line' id='LC21'><span class="sd"> *</span></div><div class='line' id='LC22'><span class="sd"> * In production mode, flash messages redirect after a time interval.</span></div><div class='line' id='LC23'><span class="sd"> * In development mode, you need to click the flash message to continue.</span></div><div class='line' id='LC24'><span class="sd"> */</span></div><div class='line' id='LC25'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">Configure</span><span class="o">::</span><span class="na">write</span><span class="p">(</span><span class="s1">&#39;debug&#39;</span><span class="p">,</span> <span class="mi">2</span><span class="p">);</span></div><div class='line' id='LC26'><br/></div><div class='line' id='LC27'><span class="sd">/**</span></div><div class='line' id='LC28'><span class="sd"> * Configure the Error handler used to handle errors for your application. By default</span></div><div class='line' id='LC29'><span class="sd"> * ErrorHandler::handleError() is used. It will display errors using Debugger, when debug &gt; 0</span></div><div class='line' id='LC30'><span class="sd"> * and log errors with CakeLog when debug = 0.</span></div><div class='line' id='LC31'><span class="sd"> *</span></div><div class='line' id='LC32'><span class="sd"> * Options:</span></div><div class='line' id='LC33'><span class="sd"> *</span></div><div class='line' id='LC34'><span class="sd"> * - `handler` - callback - The callback to handle errors. You can set this to any callable type,</span></div><div class='line' id='LC35'><span class="sd"> *   including anonymous functions.</span></div><div class='line' id='LC36'><span class="sd"> *   Make sure you add App::uses(&#39;MyHandler&#39;, &#39;Error&#39;); when using a custom handler class</span></div><div class='line' id='LC37'><span class="sd"> * - `level` - integer - The level of errors you are interested in capturing.</span></div><div class='line' id='LC38'><span class="sd"> * - `trace` - boolean - Include stack traces for errors in log files.</span></div><div class='line' id='LC39'><span class="sd"> *</span></div><div class='line' id='LC40'><span class="sd"> * @see ErrorHandler for more information on error handling and configuration.</span></div><div class='line' id='LC41'><span class="sd"> */</span></div><div class='line' id='LC42'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">Configure</span><span class="o">::</span><span class="na">write</span><span class="p">(</span><span class="s1">&#39;Error&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span></div><div class='line' id='LC43'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;handler&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;ErrorHandler::handleError&#39;</span><span class="p">,</span></div><div class='line' id='LC44'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;level&#39;</span> <span class="o">=&gt;</span> <span class="k">E_ALL</span> <span class="o">&amp;</span> <span class="o">~</span><span class="nx">E_DEPRECATED</span><span class="p">,</span></div><div class='line' id='LC45'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;trace&#39;</span> <span class="o">=&gt;</span> <span class="k">true</span></div><div class='line' id='LC46'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">));</span></div><div class='line' id='LC47'><br/></div><div class='line' id='LC48'><span class="sd">/**</span></div><div class='line' id='LC49'><span class="sd"> * Configure the Exception handler used for uncaught exceptions. By default,</span></div><div class='line' id='LC50'><span class="sd"> * ErrorHandler::handleException() is used. It will display a HTML page for the exception, and</span></div><div class='line' id='LC51'><span class="sd"> * while debug &gt; 0, framework errors like Missing Controller will be displayed. When debug = 0,</span></div><div class='line' id='LC52'><span class="sd"> * framework errors will be coerced into generic HTTP errors.</span></div><div class='line' id='LC53'><span class="sd"> *</span></div><div class='line' id='LC54'><span class="sd"> * Options:</span></div><div class='line' id='LC55'><span class="sd"> *</span></div><div class='line' id='LC56'><span class="sd"> * - `handler` - callback - The callback to handle exceptions. You can set this to any callback type,</span></div><div class='line' id='LC57'><span class="sd"> *   including anonymous functions.</span></div><div class='line' id='LC58'><span class="sd"> *   Make sure you add App::uses(&#39;MyHandler&#39;, &#39;Error&#39;); when using a custom handler class</span></div><div class='line' id='LC59'><span class="sd"> * - `renderer` - string - The class responsible for rendering uncaught exceptions. If you choose a custom class you</span></div><div class='line' id='LC60'><span class="sd"> *   should place the file for that class in app/Lib/Error. This class needs to implement a render method.</span></div><div class='line' id='LC61'><span class="sd"> * - `log` - boolean - Should Exceptions be logged?</span></div><div class='line' id='LC62'><span class="sd"> * - `skipLog` - array - list of exceptions to skip for logging. Exceptions that</span></div><div class='line' id='LC63'><span class="sd"> *   extend one of the listed exceptions will also be skipped for logging.</span></div><div class='line' id='LC64'><span class="sd"> *   Example: `&#39;skipLog&#39; =&gt; array(&#39;NotFoundException&#39;, &#39;UnauthorizedException&#39;)`</span></div><div class='line' id='LC65'><span class="sd"> *</span></div><div class='line' id='LC66'><span class="sd"> * @see ErrorHandler for more information on exception handling and configuration.</span></div><div class='line' id='LC67'><span class="sd"> */</span></div><div class='line' id='LC68'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">Configure</span><span class="o">::</span><span class="na">write</span><span class="p">(</span><span class="s1">&#39;Exception&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span></div><div class='line' id='LC69'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;handler&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;ErrorHandler::handleException&#39;</span><span class="p">,</span></div><div class='line' id='LC70'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;renderer&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;ExceptionRenderer&#39;</span><span class="p">,</span></div><div class='line' id='LC71'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;log&#39;</span> <span class="o">=&gt;</span> <span class="k">true</span></div><div class='line' id='LC72'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">));</span></div><div class='line' id='LC73'><br/></div><div class='line' id='LC74'><span class="sd">/**</span></div><div class='line' id='LC75'><span class="sd"> * Application wide charset encoding</span></div><div class='line' id='LC76'><span class="sd"> */</span></div><div class='line' id='LC77'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">Configure</span><span class="o">::</span><span class="na">write</span><span class="p">(</span><span class="s1">&#39;App.encoding&#39;</span><span class="p">,</span> <span class="s1">&#39;UTF-8&#39;</span><span class="p">);</span></div><div class='line' id='LC78'><br/></div><div class='line' id='LC79'><span class="sd">/**</span></div><div class='line' id='LC80'><span class="sd"> * To configure CakePHP *not* to use mod_rewrite and to</span></div><div class='line' id='LC81'><span class="sd"> * use CakePHP pretty URLs, remove these .htaccess</span></div><div class='line' id='LC82'><span class="sd"> * files:</span></div><div class='line' id='LC83'><span class="sd"> *</span></div><div class='line' id='LC84'><span class="sd"> * /.htaccess</span></div><div class='line' id='LC85'><span class="sd"> * /app/.htaccess</span></div><div class='line' id='LC86'><span class="sd"> * /app/webroot/.htaccess</span></div><div class='line' id='LC87'><span class="sd"> *</span></div><div class='line' id='LC88'><span class="sd"> * And uncomment the App.baseUrl below. But keep in mind</span></div><div class='line' id='LC89'><span class="sd"> * that plugin assets such as images, CSS and JavaScript files</span></div><div class='line' id='LC90'><span class="sd"> * will not work without URL rewriting!</span></div><div class='line' id='LC91'><span class="sd"> * To work around this issue you should either symlink or copy</span></div><div class='line' id='LC92'><span class="sd"> * the plugin assets into you app&#39;s webroot directory. This is</span></div><div class='line' id='LC93'><span class="sd"> * recommended even when you are using mod_rewrite. Handling static</span></div><div class='line' id='LC94'><span class="sd"> * assets through the Dispatcher is incredibly inefficient and</span></div><div class='line' id='LC95'><span class="sd"> * included primarily as a development convenience - and</span></div><div class='line' id='LC96'><span class="sd"> * thus not recommended for production applications.</span></div><div class='line' id='LC97'><span class="sd"> */</span></div><div class='line' id='LC98'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//Configure::write(&#39;App.baseUrl&#39;, env(&#39;SCRIPT_NAME&#39;));</span></div><div class='line' id='LC99'><br/></div><div class='line' id='LC100'><span class="sd">/**</span></div><div class='line' id='LC101'><span class="sd"> * To configure CakePHP to use a particular domain URL</span></div><div class='line' id='LC102'><span class="sd"> * for any URL generation inside the application, set the following</span></div><div class='line' id='LC103'><span class="sd"> * configuration variable to the http(s) address to your domain. This</span></div><div class='line' id='LC104'><span class="sd"> * will override the automatic detection of full base URL and can be</span></div><div class='line' id='LC105'><span class="sd"> * useful when generating links from the CLI (e.g. sending emails)</span></div><div class='line' id='LC106'><span class="sd"> */</span></div><div class='line' id='LC107'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//Configure::write(&#39;App.fullBaseUrl&#39;, &#39;http://example.com&#39;);</span></div><div class='line' id='LC108'><br/></div><div class='line' id='LC109'><span class="sd">/**</span></div><div class='line' id='LC110'><span class="sd"> * Web path to the public images directory under webroot.</span></div><div class='line' id='LC111'><span class="sd"> * If not set defaults to &#39;img/&#39;</span></div><div class='line' id='LC112'><span class="sd"> */</span></div><div class='line' id='LC113'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//Configure::write(&#39;App.imageBaseUrl&#39;, &#39;img/&#39;);</span></div><div class='line' id='LC114'><br/></div><div class='line' id='LC115'><span class="sd">/**</span></div><div class='line' id='LC116'><span class="sd"> * Web path to the CSS files directory under webroot.</span></div><div class='line' id='LC117'><span class="sd"> * If not set defaults to &#39;css/&#39;</span></div><div class='line' id='LC118'><span class="sd"> */</span></div><div class='line' id='LC119'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//Configure::write(&#39;App.cssBaseUrl&#39;, &#39;css/&#39;);</span></div><div class='line' id='LC120'><br/></div><div class='line' id='LC121'><span class="sd">/**</span></div><div class='line' id='LC122'><span class="sd"> * Web path to the js files directory under webroot.</span></div><div class='line' id='LC123'><span class="sd"> * If not set defaults to &#39;js/&#39;</span></div><div class='line' id='LC124'><span class="sd"> */</span></div><div class='line' id='LC125'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//Configure::write(&#39;App.jsBaseUrl&#39;, &#39;js/&#39;);</span></div><div class='line' id='LC126'><br/></div><div class='line' id='LC127'><span class="sd">/**</span></div><div class='line' id='LC128'><span class="sd"> * Uncomment the define below to use CakePHP prefix routes.</span></div><div class='line' id='LC129'><span class="sd"> *</span></div><div class='line' id='LC130'><span class="sd"> * The value of the define determines the names of the routes</span></div><div class='line' id='LC131'><span class="sd"> * and their associated controller actions:</span></div><div class='line' id='LC132'><span class="sd"> *</span></div><div class='line' id='LC133'><span class="sd"> * Set to an array of prefixes you want to use in your application. Use for</span></div><div class='line' id='LC134'><span class="sd"> * admin or other prefixed routes.</span></div><div class='line' id='LC135'><span class="sd"> *</span></div><div class='line' id='LC136'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Routing.prefixes = array(&#39;admin&#39;, &#39;manager&#39;);</span></div><div class='line' id='LC137'><span class="sd"> *</span></div><div class='line' id='LC138'><span class="sd"> * Enables:</span></div><div class='line' id='LC139'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`admin_index()` and `/admin/controller/index`</span></div><div class='line' id='LC140'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`manager_index()` and `/manager/controller/index`</span></div><div class='line' id='LC141'><span class="sd"> *</span></div><div class='line' id='LC142'><span class="sd"> */</span></div><div class='line' id='LC143'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//Configure::write(&#39;Routing.prefixes&#39;, array(&#39;admin&#39;));</span></div><div class='line' id='LC144'><br/></div><div class='line' id='LC145'><span class="sd">/**</span></div><div class='line' id='LC146'><span class="sd"> * Turn off all caching application-wide.</span></div><div class='line' id='LC147'><span class="sd"> *</span></div><div class='line' id='LC148'><span class="sd"> */</span></div><div class='line' id='LC149'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//Configure::write(&#39;Cache.disable&#39;, true);</span></div><div class='line' id='LC150'><br/></div><div class='line' id='LC151'><span class="sd">/**</span></div><div class='line' id='LC152'><span class="sd"> * Enable cache checking.</span></div><div class='line' id='LC153'><span class="sd"> *</span></div><div class='line' id='LC154'><span class="sd"> * If set to true, for view caching you must still use the controller</span></div><div class='line' id='LC155'><span class="sd"> * public $cacheAction inside your controllers to define caching settings.</span></div><div class='line' id='LC156'><span class="sd"> * You can either set it controller-wide by setting public $cacheAction = true,</span></div><div class='line' id='LC157'><span class="sd"> * or in each action using $this-&gt;cacheAction = true.</span></div><div class='line' id='LC158'><span class="sd"> *</span></div><div class='line' id='LC159'><span class="sd"> */</span></div><div class='line' id='LC160'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//Configure::write(&#39;Cache.check&#39;, true);</span></div><div class='line' id='LC161'><br/></div><div class='line' id='LC162'><span class="sd">/**</span></div><div class='line' id='LC163'><span class="sd"> * Enable cache view prefixes.</span></div><div class='line' id='LC164'><span class="sd"> *</span></div><div class='line' id='LC165'><span class="sd"> * If set it will be prepended to the cache name for view file caching. This is</span></div><div class='line' id='LC166'><span class="sd"> * helpful if you deploy the same application via multiple subdomains and languages,</span></div><div class='line' id='LC167'><span class="sd"> * for instance. Each version can then have its own view cache namespace.</span></div><div class='line' id='LC168'><span class="sd"> * Note: The final cache file name will then be `prefix_cachefilename`.</span></div><div class='line' id='LC169'><span class="sd"> */</span></div><div class='line' id='LC170'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//Configure::write(&#39;Cache.viewPrefix&#39;, &#39;prefix&#39;);</span></div><div class='line' id='LC171'><br/></div><div class='line' id='LC172'><span class="sd">/**</span></div><div class='line' id='LC173'><span class="sd"> * Session configuration.</span></div><div class='line' id='LC174'><span class="sd"> *</span></div><div class='line' id='LC175'><span class="sd"> * Contains an array of settings to use for session configuration. The defaults key is</span></div><div class='line' id='LC176'><span class="sd"> * used to define a default preset to use for sessions, any settings declared here will override</span></div><div class='line' id='LC177'><span class="sd"> * the settings of the default config.</span></div><div class='line' id='LC178'><span class="sd"> *</span></div><div class='line' id='LC179'><span class="sd"> * ## Options</span></div><div class='line' id='LC180'><span class="sd"> *</span></div><div class='line' id='LC181'><span class="sd"> * - `Session.cookie` - The name of the cookie to use. Defaults to &#39;CAKEPHP&#39;</span></div><div class='line' id='LC182'><span class="sd"> * - `Session.timeout` - The number of minutes you want sessions to live for. This timeout is handled by CakePHP</span></div><div class='line' id='LC183'><span class="sd"> * - `Session.cookieTimeout` - The number of minutes you want session cookies to live for.</span></div><div class='line' id='LC184'><span class="sd"> * - `Session.checkAgent` - Do you want the user agent to be checked when starting sessions? You might want to set the</span></div><div class='line' id='LC185'><span class="sd"> *    value to false, when dealing with older versions of IE, Chrome Frame or certain web-browsing devices and AJAX</span></div><div class='line' id='LC186'><span class="sd"> * - `Session.defaults` - The default configuration set to use as a basis for your session.</span></div><div class='line' id='LC187'><span class="sd"> *    There are four builtins: php, cake, cache, database.</span></div><div class='line' id='LC188'><span class="sd"> * - `Session.handler` - Can be used to enable a custom session handler. Expects an array of callables,</span></div><div class='line' id='LC189'><span class="sd"> *    that can be used with `session_save_handler`. Using this option will automatically add `session.save_handler`</span></div><div class='line' id='LC190'><span class="sd"> *    to the ini array.</span></div><div class='line' id='LC191'><span class="sd"> * - `Session.autoRegenerate` - Enabling this setting, turns on automatic renewal of sessions, and</span></div><div class='line' id='LC192'><span class="sd"> *    sessionids that change frequently. See CakeSession::$requestCountdown.</span></div><div class='line' id='LC193'><span class="sd"> * - `Session.ini` - An associative array of additional ini values to set.</span></div><div class='line' id='LC194'><span class="sd"> *</span></div><div class='line' id='LC195'><span class="sd"> * The built in defaults are:</span></div><div class='line' id='LC196'><span class="sd"> *</span></div><div class='line' id='LC197'><span class="sd"> * - &#39;php&#39; - Uses settings defined in your php.ini.</span></div><div class='line' id='LC198'><span class="sd"> * - &#39;cake&#39; - Saves session files in CakePHP&#39;s /tmp directory.</span></div><div class='line' id='LC199'><span class="sd"> * - &#39;database&#39; - Uses CakePHP&#39;s database sessions.</span></div><div class='line' id='LC200'><span class="sd"> * - &#39;cache&#39; - Use the Cache class to save sessions.</span></div><div class='line' id='LC201'><span class="sd"> *</span></div><div class='line' id='LC202'><span class="sd"> * To define a custom session handler, save it at /app/Model/Datasource/Session/&lt;name&gt;.php.</span></div><div class='line' id='LC203'><span class="sd"> * Make sure the class implements `CakeSessionHandlerInterface` and set Session.handler to &lt;name&gt;</span></div><div class='line' id='LC204'><span class="sd"> *</span></div><div class='line' id='LC205'><span class="sd"> * To use database sessions, run the app/Config/Schema/sessions.php schema using</span></div><div class='line' id='LC206'><span class="sd"> * the cake shell command: cake schema create Sessions</span></div><div class='line' id='LC207'><span class="sd"> *</span></div><div class='line' id='LC208'><span class="sd"> */</span></div><div class='line' id='LC209'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">Configure</span><span class="o">::</span><span class="na">write</span><span class="p">(</span><span class="s1">&#39;Session&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span></div><div class='line' id='LC210'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;defaults&#39;</span> <span class="o">=&gt;</span> <span class="s1">&#39;php&#39;</span></div><div class='line' id='LC211'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">));</span></div><div class='line' id='LC212'><br/></div><div class='line' id='LC213'><span class="sd">/**</span></div><div class='line' id='LC214'><span class="sd"> * A random string used in security hashing methods.</span></div><div class='line' id='LC215'><span class="sd"> */</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">Configure</span><span class="o">::</span><span class="na">write</span><span class="p">(</span><span class="s1">&#39;Security.salt&#39;</span><span class="p">,</span> <span class="s1">&#39;550208b6f96cb4d3e9c67c67b20175b8d19dbbb1&#39;</span><span class="p">);</span></div><div class='line' id='LC216'><br/></div><div class='line' id='LC217'><span class="sd">/**</span></div><div class='line' id='LC218'><span class="sd"> * A random numeric string (digits only) used to encrypt/decrypt strings.</span></div><div class='line' id='LC219'><span class="sd"> */</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">Configure</span><span class="o">::</span><span class="na">write</span><span class="p">(</span><span class="s1">&#39;Security.cipherSeed&#39;</span><span class="p">,</span> <span class="s1">&#39;356466336439333964393233376339&#39;</span><span class="p">);</span></div><div class='line' id='LC220'><br/></div><div class='line' id='LC221'><span class="sd">/**</span></div><div class='line' id='LC222'><span class="sd"> * Apply timestamps with the last modified time to static assets (js, css, images).</span></div><div class='line' id='LC223'><span class="sd"> * Will append a query string parameter containing the time the file was modified. This is</span></div><div class='line' id='LC224'><span class="sd"> * useful for invalidating browser caches.</span></div><div class='line' id='LC225'><span class="sd"> *</span></div><div class='line' id='LC226'><span class="sd"> * Set to `true` to apply timestamps when debug &gt; 0. Set to &#39;force&#39; to always enable</span></div><div class='line' id='LC227'><span class="sd"> * timestamping regardless of debug value.</span></div><div class='line' id='LC228'><span class="sd"> */</span></div><div class='line' id='LC229'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//Configure::write(&#39;Asset.timestamp&#39;, true);</span></div><div class='line' id='LC230'><br/></div><div class='line' id='LC231'><span class="sd">/**</span></div><div class='line' id='LC232'><span class="sd"> * Compress CSS output by removing comments, whitespace, repeating tags, etc.</span></div><div class='line' id='LC233'><span class="sd"> * This requires a/var/cache directory to be writable by the web server for caching.</span></div><div class='line' id='LC234'><span class="sd"> * and /vendors/csspp/csspp.php</span></div><div class='line' id='LC235'><span class="sd"> *</span></div><div class='line' id='LC236'><span class="sd"> * To use, prefix the CSS link URL with &#39;/ccss/&#39; instead of &#39;/css/&#39; or use HtmlHelper::css().</span></div><div class='line' id='LC237'><span class="sd"> */</span></div><div class='line' id='LC238'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//Configure::write(&#39;Asset.filter.css&#39;, &#39;css.php&#39;);</span></div><div class='line' id='LC239'><br/></div><div class='line' id='LC240'><span class="sd">/**</span></div><div class='line' id='LC241'><span class="sd"> * Plug in your own custom JavaScript compressor by dropping a script in your webroot to handle the</span></div><div class='line' id='LC242'><span class="sd"> * output, and setting the config below to the name of the script.</span></div><div class='line' id='LC243'><span class="sd"> *</span></div><div class='line' id='LC244'><span class="sd"> * To use, prefix your JavaScript link URLs with &#39;/cjs/&#39; instead of &#39;/js/&#39; or use JsHelper::link().</span></div><div class='line' id='LC245'><span class="sd"> */</span></div><div class='line' id='LC246'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//Configure::write(&#39;Asset.filter.js&#39;, &#39;custom_javascript_output_filter.php&#39;);</span></div><div class='line' id='LC247'><br/></div><div class='line' id='LC248'><span class="sd">/**</span></div><div class='line' id='LC249'><span class="sd"> * The class name and database used in CakePHP&#39;s</span></div><div class='line' id='LC250'><span class="sd"> * access control lists.</span></div><div class='line' id='LC251'><span class="sd"> */</span></div><div class='line' id='LC252'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">Configure</span><span class="o">::</span><span class="na">write</span><span class="p">(</span><span class="s1">&#39;Acl.classname&#39;</span><span class="p">,</span> <span class="s1">&#39;DbAcl&#39;</span><span class="p">);</span></div><div class='line' id='LC253'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">Configure</span><span class="o">::</span><span class="na">write</span><span class="p">(</span><span class="s1">&#39;Acl.database&#39;</span><span class="p">,</span> <span class="s1">&#39;default&#39;</span><span class="p">);</span></div><div class='line' id='LC254'><br/></div><div class='line' id='LC255'><span class="sd">/**</span></div><div class='line' id='LC256'><span class="sd"> * Uncomment this line and correct your server timezone to fix</span></div><div class='line' id='LC257'><span class="sd"> * any date &amp; time related errors.</span></div><div class='line' id='LC258'><span class="sd"> */</span></div><div class='line' id='LC259'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nb">date_default_timezone_set</span><span class="p">(</span><span class="s1">&#39;Europe/Paris&#39;</span><span class="p">);</span></div><div class='line' id='LC260'><br/></div><div class='line' id='LC261'><span class="sd">/**</span></div><div class='line' id='LC262'><span class="sd"> *</span></div><div class='line' id='LC263'><span class="sd"> * Cache Engine Configuration</span></div><div class='line' id='LC264'><span class="sd"> * Default settings provided below</span></div><div class='line' id='LC265'><span class="sd"> *</span></div><div class='line' id='LC266'><span class="sd"> * File storage engine.</span></div><div class='line' id='LC267'><span class="sd"> *</span></div><div class='line' id='LC268'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cache::config(&#39;default&#39;, array(</span></div><div class='line' id='LC269'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;engine&#39; =&gt; &#39;File&#39;, //[required]</span></div><div class='line' id='LC270'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;duration&#39; =&gt; 3600, //[optional]</span></div><div class='line' id='LC271'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;probability&#39; =&gt; 100, //[optional]</span></div><div class='line' id='LC272'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;path&#39; =&gt; CACHE, //[optional] use system tmp directory - remember to use absolute path</span></div><div class='line' id='LC273'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;prefix&#39; =&gt; &#39;cake_&#39;, //[optional]  prefix every cache file with this string</span></div><div class='line' id='LC274'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;lock&#39; =&gt; false, //[optional]  use file locking</span></div><div class='line' id='LC275'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;serialize&#39; =&gt; true, //[optional]</span></div><div class='line' id='LC276'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;mask&#39; =&gt; 0664, //[optional]</span></div><div class='line' id='LC277'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;));</span></div><div class='line' id='LC278'><span class="sd"> *</span></div><div class='line' id='LC279'><span class="sd"> * APC (http://pecl.php.net/package/APC)</span></div><div class='line' id='LC280'><span class="sd"> *</span></div><div class='line' id='LC281'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cache::config(&#39;default&#39;, array(</span></div><div class='line' id='LC282'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;engine&#39; =&gt; &#39;Apc&#39;, //[required]</span></div><div class='line' id='LC283'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;duration&#39; =&gt; 3600, //[optional]</span></div><div class='line' id='LC284'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;probability&#39; =&gt; 100, //[optional]</span></div><div class='line' id='LC285'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;prefix&#39; =&gt; Inflector::slug(APP_DIR) . &#39;_&#39;, //[optional]  prefix every cache file with this string</span></div><div class='line' id='LC286'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;));</span></div><div class='line' id='LC287'><span class="sd"> *</span></div><div class='line' id='LC288'><span class="sd"> * Xcache (http://xcache.lighttpd.net/)</span></div><div class='line' id='LC289'><span class="sd"> *</span></div><div class='line' id='LC290'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cache::config(&#39;default&#39;, array(</span></div><div class='line' id='LC291'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;engine&#39; =&gt; &#39;Xcache&#39;, //[required]</span></div><div class='line' id='LC292'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;duration&#39; =&gt; 3600, //[optional]</span></div><div class='line' id='LC293'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;probability&#39; =&gt; 100, //[optional]</span></div><div class='line' id='LC294'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;prefix&#39; =&gt; Inflector::slug(APP_DIR) . &#39;_&#39;, //[optional] prefix every cache file with this string</span></div><div class='line' id='LC295'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;user&#39; =&gt; &#39;user&#39;, //user from xcache.admin.user settings</span></div><div class='line' id='LC296'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;password&#39; =&gt; &#39;password&#39;, //plaintext password (xcache.admin.pass)</span></div><div class='line' id='LC297'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;));</span></div><div class='line' id='LC298'><span class="sd"> *</span></div><div class='line' id='LC299'><span class="sd"> * Memcache (http://www.danga.com/memcached/)</span></div><div class='line' id='LC300'><span class="sd"> *</span></div><div class='line' id='LC301'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cache::config(&#39;default&#39;, array(</span></div><div class='line' id='LC302'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;engine&#39; =&gt; &#39;Memcache&#39;, //[required]</span></div><div class='line' id='LC303'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;duration&#39; =&gt; 3600, //[optional]</span></div><div class='line' id='LC304'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;probability&#39; =&gt; 100, //[optional]</span></div><div class='line' id='LC305'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;prefix&#39; =&gt; Inflector::slug(APP_DIR) . &#39;_&#39;, //[optional]  prefix every cache file with this string</span></div><div class='line' id='LC306'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;servers&#39; =&gt; array(</span></div><div class='line' id='LC307'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;127.0.0.1:11211&#39; // localhost, default port 11211</span></div><div class='line' id='LC308'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;), //[optional]</span></div><div class='line' id='LC309'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;persistent&#39; =&gt; true, // [optional] set this to false for non-persistent connections</span></div><div class='line' id='LC310'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;compress&#39; =&gt; false, // [optional] compress data in Memcache (slower, but uses less memory)</span></div><div class='line' id='LC311'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;));</span></div><div class='line' id='LC312'><span class="sd"> *</span></div><div class='line' id='LC313'><span class="sd"> *  Wincache (http://php.net/wincache)</span></div><div class='line' id='LC314'><span class="sd"> *</span></div><div class='line' id='LC315'><span class="sd"> * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cache::config(&#39;default&#39;, array(</span></div><div class='line' id='LC316'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;engine&#39; =&gt; &#39;Wincache&#39;, //[required]</span></div><div class='line' id='LC317'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;duration&#39; =&gt; 3600, //[optional]</span></div><div class='line' id='LC318'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;probability&#39; =&gt; 100, //[optional]</span></div><div class='line' id='LC319'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;prefix&#39; =&gt; Inflector::slug(APP_DIR) . &#39;_&#39;, //[optional]  prefix every cache file with this string</span></div><div class='line' id='LC320'><span class="sd"> *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;));</span></div><div class='line' id='LC321'><span class="sd"> */</span></div><div class='line' id='LC322'><br/></div><div class='line' id='LC323'><span class="sd">/**</span></div><div class='line' id='LC324'><span class="sd"> * Configure the cache handlers that CakePHP will use for internal</span></div><div class='line' id='LC325'><span class="sd"> * metadata like class maps, and model schema.</span></div><div class='line' id='LC326'><span class="sd"> *</span></div><div class='line' id='LC327'><span class="sd"> * By default File is used, but for improved performance you should use APC.</span></div><div class='line' id='LC328'><span class="sd"> *</span></div><div class='line' id='LC329'><span class="sd"> * Note: &#39;default&#39; and other application caches should be configured in app/Config/bootstrap.php.</span></div><div class='line' id='LC330'><span class="sd"> *       Please check the comments in bootstrap.php for more info on the cache engines available</span></div><div class='line' id='LC331'><span class="sd"> *       and their settings.</span></div><div class='line' id='LC332'><span class="sd"> */</span></div><div class='line' id='LC333'><span class="nv">$engine</span> <span class="o">=</span> <span class="s1">&#39;File&#39;</span><span class="p">;</span></div><div class='line' id='LC334'><br/></div><div class='line' id='LC335'><span class="c1">// In development mode, caches should expire quickly.</span></div><div class='line' id='LC336'><span class="nv">$duration</span> <span class="o">=</span> <span class="s1">&#39;+999 days&#39;</span><span class="p">;</span></div><div class='line' id='LC337'><span class="k">if</span> <span class="p">(</span><span class="nx">Configure</span><span class="o">::</span><span class="na">read</span><span class="p">(</span><span class="s1">&#39;debug&#39;</span><span class="p">)</span> <span class="o">&gt;</span> <span class="mi">0</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC338'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$duration</span> <span class="o">=</span> <span class="s1">&#39;+10 seconds&#39;</span><span class="p">;</span></div><div class='line' id='LC339'><span class="p">}</span></div><div class='line' id='LC340'><br/></div><div class='line' id='LC341'><span class="c1">// Prefix each application on the same server with a different string, to avoid Memcache and APC conflicts.</span></div><div class='line' id='LC342'><span class="nv">$prefix</span> <span class="o">=</span> <span class="s1">&#39;app_&#39;</span><span class="p">;</span></div><div class='line' id='LC343'><br/></div><div class='line' id='LC344'><span class="sd">/**</span></div><div class='line' id='LC345'><span class="sd"> * Configure the cache used for general framework caching. Path information,</span></div><div class='line' id='LC346'><span class="sd"> * object listings, and translation cache files are stored with this configuration.</span></div><div class='line' id='LC347'><span class="sd"> */</span></div><div class='line' id='LC348'><span class="nx">Cache</span><span class="o">::</span><span class="na">config</span><span class="p">(</span><span class="s1">&#39;_cake_core_&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span></div><div class='line' id='LC349'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;engine&#39;</span> <span class="o">=&gt;</span> <span class="nv">$engine</span><span class="p">,</span></div><div class='line' id='LC350'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;prefix&#39;</span> <span class="o">=&gt;</span> <span class="nv">$prefix</span> <span class="o">.</span> <span class="s1">&#39;cake_core_&#39;</span><span class="p">,</span></div><div class='line' id='LC351'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;path&#39;</span> <span class="o">=&gt;</span> <span class="nx">CACHE</span> <span class="o">.</span> <span class="s1">&#39;persistent&#39;</span> <span class="o">.</span> <span class="nx">DS</span><span class="p">,</span></div><div class='line' id='LC352'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;serialize&#39;</span> <span class="o">=&gt;</span> <span class="p">(</span><span class="nv">$engine</span> <span class="o">===</span> <span class="s1">&#39;File&#39;</span><span class="p">),</span></div><div class='line' id='LC353'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;duration&#39;</span> <span class="o">=&gt;</span> <span class="nv">$duration</span></div><div class='line' id='LC354'><span class="p">));</span></div><div class='line' id='LC355'><br/></div><div class='line' id='LC356'><span class="sd">/**</span></div><div class='line' id='LC357'><span class="sd"> * Configure the cache for model and datasource caches. This cache configuration</span></div><div class='line' id='LC358'><span class="sd"> * is used to store schema descriptions, and table listings in connections.</span></div><div class='line' id='LC359'><span class="sd"> */</span></div><div class='line' id='LC360'><span class="nx">Cache</span><span class="o">::</span><span class="na">config</span><span class="p">(</span><span class="s1">&#39;_cake_model_&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span></div><div class='line' id='LC361'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;engine&#39;</span> <span class="o">=&gt;</span> <span class="nv">$engine</span><span class="p">,</span></div><div class='line' id='LC362'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;prefix&#39;</span> <span class="o">=&gt;</span> <span class="nv">$prefix</span> <span class="o">.</span> <span class="s1">&#39;cake_model_&#39;</span><span class="p">,</span></div><div class='line' id='LC363'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;path&#39;</span> <span class="o">=&gt;</span> <span class="nx">CACHE</span> <span class="o">.</span> <span class="s1">&#39;models&#39;</span> <span class="o">.</span> <span class="nx">DS</span><span class="p">,</span></div><div class='line' id='LC364'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;serialize&#39;</span> <span class="o">=&gt;</span> <span class="p">(</span><span class="nv">$engine</span> <span class="o">===</span> <span class="s1">&#39;File&#39;</span><span class="p">),</span></div><div class='line' id='LC365'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;duration&#39;</span> <span class="o">=&gt;</span> <span class="nv">$duration</span></div><div class='line' id='LC366'><span class="p">));</span></div></pre></div>
            </td>
          </tr>
        </table>
  </div>

  </div>
</div>

<a href="#jump-to-line" rel="facebox[.linejump]" data-hotkey="l" class="js-jump-to-line" style="display:none">Jump to Line</a>
<div id="jump-to-line" style="display:none">
  <form accept-charset="UTF-8" class="js-jump-to-line-form">
    <input class="linejump-input js-jump-to-line-field" type="text" placeholder="Jump to line&hellip;" autofocus>
    <button type="submit" class="button">Go</button>
  </form>
</div>

        </div>

      </div><!-- /.repo-container -->
      <div class="modal-backdrop"></div>
    </div><!-- /.container -->
  </div><!-- /.site -->


    </div><!-- /.wrapper -->

      <div class="container">
  <div class="site-footer">
    <ul class="site-footer-links right">
      <li><a href="https://status.github.com/">Status</a></li>
      <li><a href="http://developer.github.com">API</a></li>
      <li><a href="http://training.github.com">Training</a></li>
      <li><a href="http://shop.github.com">Shop</a></li>
      <li><a href="/blog">Blog</a></li>
      <li><a href="/about">About</a></li>

    </ul>

    <a href="/">
      <span class="mega-octicon octicon-mark-github" title="GitHub"></span>
    </a>

    <ul class="site-footer-links">
      <li>&copy; 2014 <span title="0.07364s from github-fe126-cp1-prd.iad.github.net">GitHub</span>, Inc.</li>
        <li><a href="/site/terms">Terms</a></li>
        <li><a href="/site/privacy">Privacy</a></li>
        <li><a href="/security">Security</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
  </div><!-- /.site-footer -->
</div><!-- /.container -->


    <div class="fullscreen-overlay js-fullscreen-overlay" id="fullscreen_overlay">
  <div class="fullscreen-container js-fullscreen-container">
    <div class="textarea-wrap">
      <textarea name="fullscreen-contents" id="fullscreen-contents" class="js-fullscreen-contents" placeholder="" data-suggester="fullscreen_suggester"></textarea>
          <div class="suggester-container">
              <div class="suggester fullscreen-suggester js-navigation-container" id="fullscreen_suggester"
                 data-url="/digisquare/digisquare/suggestions/commit">
              </div>
          </div>
    </div>
  </div>
  <div class="fullscreen-sidebar">
    <a href="#" class="exit-fullscreen js-exit-fullscreen tooltipped leftwards" title="Exit Zen Mode">
      <span class="mega-octicon octicon-screen-normal"></span>
    </a>
    <a href="#" class="theme-switcher js-theme-switcher tooltipped leftwards"
      title="Switch themes">
      <span class="octicon octicon-color-mode"></span>
    </a>
  </div>
</div>



    <div id="ajax-error-message" class="flash flash-error">
      <span class="octicon octicon-alert"></span>
      <a href="#" class="octicon octicon-remove-close close ajax-error-dismiss"></a>
      Something went wrong with that request. Please try again.
    </div>

  </body>
</html>

