<md-dialog aria-label="{{ edit.name }}">
	<form ng-submit="update(this)">
	<md-toolbar>
		<div class="md-toolbar-tools">
			<h2>{{ edit.name }}</h2>
			<span flex></span>
			<md-button type="button" class="md-icon-button" ng-click="cancel()">
				<md-icon md-svg-src="<?php echo adminAsset('assets/icon/ic_close_24px.svg'); ?>" aria-label="Close dialog"></md-icon>
			</md-button>
		</div>
	</md-toolbar>
	<md-dialog-content>
		<div layout="row" layout-sm="column">
			<md-input-container flex>
				<label>Menuname</label>
				<input ng-model="edit.name">
			</md-input-container>
			<md-input-container flex>
				<label>Icon</label>
				<input ng-model="edit.icon">
			</md-input-container>
		</div>
		<div layout="row">
			<md-input-container flex>
				<label>Link</label>
				<input ng-model="edit.link">
			</md-input-container>
		</div>
		<div layout="row">
			<md-input-container flex>
				<label>sub</label>
				<input ng-model="edit.sub">
			</md-input-container>
			<md-select placeholder="Target" ng-model="edit.target">
				<md-option value="0">parent</md-option>
				<md-option value="1">blank</md-option>
			</md-select>
			<md-select placeholder="Type" ng-model="edit.type">
				<md-option value="0">first</md-option>
				<md-option value="1">second</md-option>
				<md-option value="2">third</md-option>
			</md-select>
		</div>
	</md-dialog-content>
		<div class="md-actions" layout="row">
			<md-button class="md-raised" ng-click="cancel()" type="button">ยกเลิก</md-button>
			<md-button class="md-raised md-warn" ng-click="delete()" type="button">ลบ</md-button>
			<md-button class="md-raised md-primary" type="submit">บันทึก</md-button>
		</div>
	</form>
</md-dialog>
