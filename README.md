
# How To Use

1 - Install Extension

```javascript
composer require soft2do/moduleview-draggable:^1.0
```

2 - Add "sorting" column to databse

```javascript
CREATE TABLE tx_project_domain_model_name (
	sorting int(11) NOT NULL DEFAULT 0
);
```

3 - Update TCA 

```javascript
$GLOBALS['TCA']['tx_project_domain_model_name']['ctrl']['default_sortby'] ='sorting';
$GLOBALS['TCA']['tx_project_domain_model_name']['ctrl']['sortby'] ='sorting';
$GLOBALS['TCA']['tx_project_domain_model_name']['ctrl']['draggable'] =true;

```

3 - Update Repository  (To enable Sorting on frontend)

```javascript
protected $defaultOrderings = [
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
];
```
