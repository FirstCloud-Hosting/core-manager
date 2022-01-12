<include tpl="header.tpl" once="true" />
<div class="content-page">
      <div class="page-error tile">
      	<h3>{textCurrentCoreVersion} : {currentVersion}</h3>
      	<h3>{textLastCoreVersion} : {lastVersion}</h3>
      	<if condition="{$updateAvailable} == 'update'">
	        <p>{textAnUpdateIsAvailable}</p>
	        <p><a class="btn btn-primary" href="update?confirm&{tokenName}={token}">{textUpgrade}</a></p>
    	</if>
      </div>
<include tpl="footer.tpl" once="true" />