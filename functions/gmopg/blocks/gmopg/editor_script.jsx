registerBlockType('catpow/gmopg',{
	title: '🐾 Gmopg',
	icon: 'cart',
	category: 'catpow',
	edit({attributes,className,setAttributes,isSelected}){
		const {Fragment,useMemo}=wp.element;
		const {items,classes}=attributes;
		const primaryClass='wp-block-catpow-gmopg';
        
		const selectiveClasses=useMemo(()=>{
			return [
				{input:'text',label:'注文ID',key:'OrderID'},
				{input:'text',label:'価格',key:'Amount'},
				{input:'text',label:'取引詳細',key:'Detail'},
				{input:'text',label:'決済方法',key:'PayMethods'},
			];
		},[]);
		
        return (
			<Fragment>
				<InspectorControls>
					<CP.SelectClassPanel
						title={__('クラス','catpow')}
						icon='art'
						set={setAttributes}
						attr={attributes}
						selectiveClasses={selectiveClasses}
						filters={CP.filters.section || {}}
					/>
				</InspectorControls>
				<div className="wp-block-catpow-gmopg">
					<a className="wp-block-catpow-gmopg__button">
						<RichText onChange={(text)=>{setAttributes({text});}} value={attributes.text}/>
					</a>
				</div>
			</Fragment>
        );
    },
	save({attributes,className}){
        return (
			<div className="wp-block-catpow-gmopg">
				<a className="wp-block-catpow-gmopg__button" href="[gmopg_checkout_url]">
					<RichText.Content value={attributes.text}/>
				</a>
			</div>
        );
	},
});