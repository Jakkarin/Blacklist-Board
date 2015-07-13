<div layout="row" layout-padding layout-sm="column">
	<div flex>
	<style type="text/css">
	ul.menu_list,.menu_list li {
		list-style: none;
	}
	ul.menu_list ul.submenu {
		border-top:1px solid #eee;
		border-bottom:1px solid #eee;
	}
	ul.menu_list ul.submenu2 {
		border-top:1px solid #eee;
	}
	ul.menu_list .md-button {
		margin: 0;
		text-align: left;
	}
	ul.menu_list .md-button md-icon.active {
		transform: rotate(90deg);
	}
	</style>
		<ul class="menu_list">
			<li ng-repeat="list in data01 | orderBy:'order'" ng-if="list.type === '0'">
				<md-button ng-click="sEdit($event,list.id)">
					{{ list.name }}
					<md-tooltip md-direction="left">ID : {{list.id}}</md-tooltip>
				</md-button>
				<span ng-if="data02_check.indexOf(list.id+',') >= 0;">
				<md-button class="md-icon-button" ng-init="toggle=true;active=true" ng-click="toggle=!toggle;active=!active" ng-model="toggle" aria-label="false" style="text-align:center;">
					<md-icon class="{{ active?'active':'' }}" aria-hidden="true" md-svg-src="<?php echo adminAsset('assets/icon/icon_right.svg'); ?>"></md-icon>
					<md-tooltip md-direction="top">Toggle</md-tooltip>
				</md-button>
				<ul class="submenu" ng-show="toggle">
					<li ng-repeat="list02 in data02 | orderBy:'order'" ng-if="list02.type === '1' && list02.sub === list.id">
						<md-button ng-click="sEdit($event,list02.id)">
							<md-icon aria-hidden="true" md-svg-src="<?php echo adminAsset('assets/icon/icon_right.svg'); ?>"></md-icon>
							{{ list02.name }}
							<md-tooltip md-direction="left">ID : {{list02.id}}</md-tooltip>
							</md-button>
						<span ng-if="data03_check.indexOf(list02.id+',') >= 0;">
						<ul class="submenu2">
							<li ng-repeat="list03 in data03 | orderBy:'order'" ng-if="list03.type === '2' && list03.sub === list02.id">
								<md-button ng-click="sEdit($event,list03.id)">
									<md-icon aria-hidden="true" md-svg-src="<?php echo adminAsset('assets/icon/icon_right.svg'); ?>"></md-icon>
									{{ list03.name }}
									<md-tooltip md-direction="left">ID : {{list03.id}}</md-tooltip>
								</md-button>
							</li>
						</ul>
						</span>
					</li>
				</ul>
				</span>
			</li>
		</ul>
	</div>
	<div flex>
		<form ng-submit="sCreate(this)">
			<div layout="row" layout-sm="column">
				<md-input-container flex>
					<label>Name</label>
					<input ng-model="create.name">
				</md-input-container>
				<md-input-container flex>
					<label>Icon</label>
					<input ng-model="create.icon">
				</md-input-container>
			</div>
			<div layout="row">
				<md-input-container flex>
					<label>Link</label>
					<input ng-model="create.link">
				</md-input-container>
			</div>
			<div layout="row">
				<md-input-container flex>
					<label>sub</label>
					<input ng-model="create.sub">
				</md-input-container>
				<md-input-container flex>
					<label>order</label>
					<input ng-model="create.order">
				</md-input-container>
				<md-select placeholder="Target" ng-model="create.target">
					<md-option value="0">parent</md-option>
					<md-option value="1">blank</md-option>
				</md-select>
				<md-select placeholder="Type" ng-model="create.type">
					<md-option value="0">first</md-option>
					<md-option value="1">second</md-option>
					<md-option value="2">third</md-option>
				</md-select>
			</div>
			<div layout="row">
				<md-button class="md-raised md-primary">submit</md-button>
			</div>
		<form>
	</div>
</div>