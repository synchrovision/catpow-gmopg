registerBlockType('catpow/gmopg',{
	title: '🐾 Gmopg',
	icon: 'cart',
	category: 'catpow',
	edit({attributes,className,setAttributes,isSelected}){
		const {Fragment,useMemo}=wp.element;
		const {items,classes}=attributes;
		const primaryClass='wp-block-catpow-gmopg';
        
		const sendSomeMail=attributes.GuideMailSendFlag||attributes.ThanksMailSendFlag;
		const selectiveClasses=[
			{input:'text',label:'注文ID',key:'OrderID'},
			{input:'text',label:'価格',key:'Amount'},
			{input:'text',label:'取引詳細',key:'Detail'},
			{input:'bool',label:'決済URL案内メール送信',key:'GuideMailSendFlag'},
			{input:'bool',label:'購入ありがとうメール送信',key:'ThanksMailSendFlag'},
			{input:'text',label:'メール送信先アドレス',key:'SendMailAddress',cond:sendSomeMail},
			{input:'text',label:'顧客名',key:'CustomerName',cond:sendSomeMail},
			{input:'text',label:'メール送信元',key:'FromSendMailAddress',cond:sendSomeMail},
			{input:'text',label:'メール送信元名',key:'FromSendMailName',cond:sendSomeMail},
			{input:'text',label:'BCC送信先',key:'BccSendMailAddress',cond:sendSomeMail},
			{input:'text',label:'テンプレートNo',key:'TemplateNo',cond:sendSomeMail}
		];
		
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